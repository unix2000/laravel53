/*
** app.js message不能传入, {{ $message }} blade引擎解析不到
** 直接放入能解析到
*/

new Vue({
	el:'#app',
	data:{
		"message": "{{ $message }}",		
		"books": [
			{
				"id": 1,
				"author": "曹雪芹",
				"name": "红楼梦",
				"price": 32
			},
			{
				"id": 2,
				"author": "施耐庵",
				"name": "水浒传",
				"price": 30
			},
			{
				"id": "3",
				"author": "罗贯中",
				"name": "三国演义",
				"price": 24
			},
			{
				"id": 4,
				"author": "吴承恩",
				"name": "西游记",
				"price": 20
			}
		]
	},
	methods: {
		addBook: function() {
			//计算书的id
			this.book.id = this.books.length + 1;
			this.books.push(this.book);
			//将input中的数据重置
			this.book = '';
		}
	}
});