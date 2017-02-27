@extends('layouts.s')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"  id="content-wrapper">
    <div class="content-tabs">
        <button class="roll-nav roll-left tabLeft" onclick="scrollTabLeft()">
            <i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs menuTabs tab-ui-menu" id="tab-menu">
            <div class="page-tabs-content" style="margin-left: 0px;">

            </div>
        </nav>
        <button class="roll-nav roll-right tabRight" onclick="scrollTabRight()">
            <i class="fa fa-forward" style="margin-left: 3px;"></i>
        </button>
        <div class="btn-group roll-nav roll-right">
            <button class="dropdown tabClose" data-toggle="dropdown">
                页签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" style="min-width: 128px;">
                <li><a class="tabReload" href="javascript:refreshTab();">刷新当前</a></li>
                <li><a class="tabCloseCurrent" href="javascript:closeCurrentTab();">关闭当前</a></li>
                <li><a class="tabCloseAll" href="javascript:closeOtherTabs(true);">全部关闭</a></li>
                <li><a class="tabCloseOther" href="javascript:closeOtherTabs();">除此之外全部关闭</a></li>
            </ul>
        </div>
        <button class="roll-nav roll-right fullscreen" onclick="App.handleFullScreen()"><i class="fa fa-arrows-alt"></i></button>
    </div>
    <div class="content-iframe " style="background-color: #ffffff; ">
        <div class="tab-content " id="tab-content">

        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        addTabs(({ id: '10008', title: '欢迎页', close: false, url: 'ui/dashboard' }));
        App.fixIframeCotent();
        var menus = [
             { id: "10010", text: "我的工作台", isHeader: true },
              {
                  id: "10020",
                  isOpen: false,
                  text: "SuperShopUI",
                  icon: "fa fa-bookmark-o",
                  children: [
                      {
                          id: "10021",
                          text: "页面加载",
                          isOpen: false,
                          icon: "fa fa-circle-o",
                          children: [
                              { id: "10022", text: "iframe加载", url: "../admin/index_iframe.html", targetType: "blank", icon: "fa fa-spinner" },
                              { id: "10023", text: "ajax加载", url: "../admin/index.html", targetType: "blank", icon: "fa fa-refresh" },
                               { id: "10023", text: "原生页面加载", url: "../admin/index_page.html", targetType: "blank", icon: "fa fa-refresh" }

                          ]
                      }
                  ]
              },
             
              {
                  id: "10001",
                  text: "基础UI",
                
                  icon: "fa fa-circle-o",
                  children: [
                       { id: "10004", text: "按钮", url: "ui/bao", targetType: "iframe-tab", icon: "fa fa-square" },
                      { id: "10003", text: "常用组件", url: "/ui/ajax", targetType: "ajax", icon: "fa fa-list-alt" },
                     
                      { id: "10012", text: "图标库", url: "../components/icons.html", targetType: "iframe-tab", icon: "fa fa-circle-o" },
                      {
                          id: "10203",
                          text: "表单组件",
                          url: "../forms/general.html",
                          targetType: "iframe-tab",
                          icon: "fa fa-plus-square-o"
                      },
                       {
                           id: "10204",
                           text: "表单扩展组件",
                           url: "../forms/advanced.html",
                           targetType: "iframe-tab",
                           icon: "fa fa-plus-square-o"
                       },
                       { id: "10005", text: "Block UI", url: "../components/blockui.html", targetType: "iframe-tab", icon: "fa fa-spinner" },
                      { id: "10013", text: "sliders组件",tips:5, url: "../components/sliders.html", targetType: "iframe-tab", icon: "fa fa-list-ol" },
                      { id: "10204", text: "switch按钮", targetType: "iframe-tab", url: "../components/bootstrapswitch.html", icon: "fa fa-toggle-on" },
                      { id: "10017", text: "面板", targetType: "iframe-tab", url: "../components/widgets.html", icon: "fa fa-circle-o" }
                  ]
              },
         
              {
                  id: "10202",
                  text: "插件",

                  targetType: "iframe-tab",
                  icon: "fa fa-circle-o",
                  children: [
                       { id: "10026", text: "layer弹出层", targetType: "iframe-tab",  url: "../components/layer.html", icon: "fa fa-circle-o" },
                      { id: "10006", text: "日历选择控件", targetType: "iframe-tab", url: "../component-extend/calendar.html", icon: "fa fa-circle-o" },
                          { id: "10014", text: "时间轴", targetType: "iframe-tab", url: "../component-extend/timeline.html", icon: "fa fa-circle-o" },
                      { id: "10010", text: "页面加载效果", targetType: "iframe-tab", url: "../component-extend/pageprogress.html", icon: "fa fa-circle-o" },
                      { id: "10016", text: "树", targetType: "iframe-tab", url: "../component-extend/jstree.html", icon: "fa fa-circle-o" },
                      //{ id: "10241", text: "下拉框", targetType: "iframe-tab", url: "../component-extend/bootstrap_select.html", icon: "fa fa-minus-square-o" },
                  
                        { id: "10014", text: "日起选择组件", targetType: "iframe-tab", url: "../component-extend/datetimepickers.html", icon: "fa fa-calendar" },
                      { id: "10242", text: "select2下拉框", targetType: "iframe-tab", url: "../component-extend/select2.html", icon: "fa fa-circle-o" },
                      { id: "10205", text: "多选框", targetType: "iframe-tab", url: "../component-extend/bootstraptagsinput.html", icon: " fa fa-check-square-o" },
                      { id: "10206", text: "多文件上传组件", targetType: "iframe-tab", url: "../component-extend/formfileupload.html", icon: "  fa fa-circle-o " }
                  ]

              },
              {
                  id: "10208",
                  text: "表格组件",

                  icon: "fa fa-circle-o",
                  children: [
                      { id: "10211", text: "bootstraptable表格", targetType: "iframe-tab", url: "../tables/basetable.html", icon: "fa fa-table" },
                      { id: "10212", text: "管理表格", targetType: "iframe-tab", url: "../tables/managetable.html", icon: "fa fa-table" },
                        { id: "10213", text: "jqgrid表格", targetType: "iframe-tab", url: "../tables/jqgrid.html", icon: "fa fa-table" }
                  ]
              },
               {
                   id: "10209", text: "通用模板", isOpen: false,  icon: "fa fa-circle-o", children: [
                   { id: "10214", text: "企业站", targetType: "blank", url: "http://www.supermgr.cn", icon: "fa fa-circle-o" }//,
                   //{ id: "10215", text: "微信端", targetType: "blank", url: "../template/test2.html", icon: "fa fa-circle-o" }
                   ]

               },
                
                 {
                     id: "20209", text: "布局", isOpen: false, icon: "fa fa-circle-o", children: [
                     { id: "20214", text: "盒式布局", targetType: "blank", url: "../layout/boxed.html", icon: "fa fa-circle-o" },
                     { id: "20215", text: "自适应布局", targetType: "blank", url: "../layout/fixed.html", icon: "fa fa-circle-o" },
                       { id: "20216", text: "顶部菜单", targetType: "blank", url: "../layout/top-nav.html", icon: "fa fa-circle-o" },
                           { id: "20217", text: "左侧菜单收缩", targetType: "blank", url: "../layout/collapsed-sidebar.html", icon: "fa fa-circle-o" }
                     ]

                 },
                {
                    id: "30209", text: "图表", isOpen: false, icon: "fa fa-circle-o", children: [
                    { id: "30214", text: "chart图表", targetType: "iframe-tab", url: "../charts/chartjs.html", icon: "fa fa-circle-o" },
                    { id: "30215", text: "flot图表", targetType: "iframe-tab", url: "../charts/flot.html", icon: "fa fa-circle-o" },
                      { id: "30216", text: "inline图表", targetType: "iframe-tab", url: "../charts/inline.html", icon: "fa fa-circle-o" },
                          { id: "30217", text: "morris图表", targetType: "iframe-tab", url: "../charts/morris.html", icon: "fa fa-circle-o" }
                    ]

                },
                 {
                     id: "30209", text: "页面实例", isOpen: false, icon: "fa fa-circle-o", children: [
                   {
                       id: "30208",
                       text: "邮件管理器",

                       icon: "fa fa-circle-o",
                       children: [
                           { id: "30211", text: "邮件管理", targetType: "iframe-tab", url: "../pages/mailbox/mailbox.html", icon: "fa fa-table" },
                           { id: "30212", text: "阅读邮件", targetType: "iframe-tab", url: "../pages/mailbox/read-mail.html", icon: "fa fa-table" },
                             { id: "30213", text: "发送邮件", targetType: "iframe-tab", url: "../pages/mailbox/compose.html", icon: "fa fa-table" }
                       ]
                   },
                   {
                       id: "40208",
                       text: "SuperMgr后台Demo",
                       icon: "fa fa-circle-o",
                       targetType: "blank", url: "../pages/supermgr/index.html"
                   }
                     ]

                 }
        ];
        $('.sidebar-menu').sidebarMenu({ data: menus, param: { strUser: 'admin' } });

       
    });
</script>
@endsection