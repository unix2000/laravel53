@extends('layouts.uikit')

@section('css')
<link href="{{ asset('static/bui/css/bs3/dpl.css') }}" rel="stylesheet">
<link href="{{ asset('static/bui/css/bs3/bui.css') }}" rel="stylesheet">
@endsection

@section('content')
	<h1>Tree Select上报--</h1>
	<div class="uk-grid" data-uk-grid-margin>
		<div class="uk-width-4-5 uk-container-center">
			<div id="grid"></div>
		</div>
		<div class="uk-width-4-5 uk-container-center">
			<button type="sumbmit" class="button button-primary" id="bSubmit">提交</button>
		</div>
	</div>
@endsection

@section('script')
<script src="{{ asset('static/bui/seed-min.js') }}"></script>
<script type="text/javascript">
BUI.use(['bui/extensions/treepicker','bui/grid','bui/data','bui/picker','bui/tree'],function(TreePicker,Grid,Data,Picker,Tree){
        var nodes = [ 
              {text : '1中文',id : '1',children: [{text : '11中文',id : '11'}]},
              {text : '2中文',id : '2',expanded : true,children : [
                  {text : '21中文',id : '21',children : [{text : '211中文',id : '211'},{text : '212中文',id : '212'}]},
                  {text : '22中文',id : '22'}
              ]},
              {text : '3中文',id : '3'},
              {text : '4中文',id : '4'}
            ],
          //由于这个树，不显示根节点，所以可以不指定根节点
          tree = new Tree.TreeList({
            nodes : nodes,
            dirSelectable : false,//阻止树节点选中
            showLine : false //显示连接线
          });
     
        var picker = new Picker.ListPicker({
            width:150,  //指定宽度
            children : [tree] //配置picker内的列表
        });

//         var picker = new TreePicker({
//             width:150,  //指定宽度
//             children : [tree] //配置picker内的列表
//         });
        var Grid = Grid,
          Store = Data.Store,
          enumObj = {"1" : "选项一","2" : "选项二","3" : "选项三"},
          columns = [
            {title : '文本',dataIndex :'a',editor : {xtype : 'text'}}, 
            {title : '数字', dataIndex :'b',editor : {xtype : 'number',rules : {required : true}}},
            {title : '树单选',dataIndex : 'd', editor : {xtype :'select',select : {picker : picker}}},
            {title : '多选',dataIndex : 'e', editor : {xtype :'select',select:{multipleSelect : true},items : enumObj},renderer : Grid.Format.multipleItemsRenderer(enumObj)}
          ],
          data = [{a:'123',e:'2,3'},{a:'cdd',c:1363924044176},{a:'1333',b:2222,d:2}];
        var editing = new Grid.Plugins.CellEditing(),
          store = new Store({
            data : data,
            autoLoad:true
          }),
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                  btnCls : 'button button-small',
                  text : '<i class="icon-plus"></i>添加',
                  listeners : {
                    'click' : addFunction
                  }
                },
                {
                  btnCls : 'button button-small',
                  text : '<i class="icon-remove"></i>删除',
                  listeners : {
                    'click' : delFunction
                  }
                }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection],
            store : store
          });
 
        grid.render();
        $('#bSubmit').on('click',function(e){
            console.log(grid.getItems());
        });
        //添加记录
        function addFunction(){
          var newData = {b : 0};
          store.addAt(newData,0);
          editing.edit(newData,'a'); //添加记录后，直接编辑
        }
        //删除选中的记录
        function delFunction(){
          var selections = grid.getSelection();
          store.remove(selections);
        }          
});
</script>
@endsection