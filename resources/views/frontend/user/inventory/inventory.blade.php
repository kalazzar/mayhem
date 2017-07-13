@extends('layouts.master')

@section('content')

<style type="text/css">
	.paginatorButton{
  padding:5px 10px 5px 10px;
  border-radius: 20px;
  outline: none;
  margin: 20px;
  font-weight: bold;
  background-color: #3C899D;
  color:white;
  border: none;
  transition: .2s ease-out;
  box-shadow:0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
}
.paginatorButton:active , .paginatorButton:focus{
	background-color: #3C899D;
}
.paginatorButton:hover{
	background-color: #7b1fa2;
}
</style>


<link rel="stylesheet" href="{{asset('css/inventory_style.css')}}">
<div class="main store_body">
	<div class="title" style="margin-bottom: 30px;">
		  <ul id="tabs-swipe-demo" class="tabs">
		    <li class="tab col s3"><a href="#InvStore">Inventory Store</a></li>
		    <!-- <li class="tab col s3"><a href="#InvOut">Inventory Out</a></li> -->
		  </ul>
    </div>

<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
	<div id="InvStore" class="col s12">

   <template id="grid-template">
	  <table>
	    <thead>
	      <tr>
	        <th v-for="key in columns"
	          @click="sortBy(key)"
	          :class="{ active: sortKey == key }">
	          @{{ key | capitalize }}
	          <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
	          </span>
	        </th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr v-for="entry in filteredData | limitBy rowsPerPage startRow">
	        <td v-for="key in columns">
	          @{{entry[key]}}
	        </td>
	       <!--  <td>@{{entry.name}}</td>
       		<td>@{{entry.batch}}</td>
       		<td>@{{entry.quantity}}</td> -->
	        <td class="pull-right"><button data-target="detailModal@{{entry.batch}}" class="btn btn-primary">Detail</button></td>
	      </tr>
	    </tbody>
	  </table>

	  <div id="page-navigation" style="text-align: center">
	    <button class="paginatorButton" @click=movePages(-1) style="display: inline-block;">Back</button>
	    <p style="display: inline-block;">@{{startRow / rowsPerPage + 1}} out of @{{Math.ceil(data.length / rowsPerPage)}}</p>
	    <button class="paginatorButton" @click=movePages(1) style="display: inline-block;">Next</button>
	  </div>

	</template>

	<!-- demo root element -->
	  <form id="search">
	  	<div class="row" style="margin-right: 20px;margin-bottom: -10px">
		    <div class="col s12">
		      <div class="row">
		        <div class="input-field col s12">
		          <i class="material-icons prefix">search</i>
		          <input id="search" placeholder="Search" name="query" v-model="searchQuery" @keyup="resetStartRow">
		          <!-- <label for="autocomplete-output">Search</label> -->
		        </div>
		      </div>
		    </div>
		  </div>
	  </form>

	   <grid :data="gridData | orderByBusinessRules | filterBy searchQuery" :columns="gridColumns" :move-pages="movePages" :start-row="startRow" :rows-per-page="rowsPerPage">
  </grid>
	</div> <!-- invStore end -->

<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
	<div id="InvOut" class="col s12" style="display: none">


   <template id="grid-template">
	  <table>
	    <thead>
	      <tr>
	        <th v-for="key in columns"
	          @click="sortBy(key)"
	          :class="{ active: sortKey == key }">
	          @{{ key | capitalize }}
	          <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
	          </span>
	        </th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr v-for="entry in filteredData | limitBy rowsPerPage startRow">
	        <td>@{{entry.name}}</td>
       		<td>@{{entry.batch}}</td>
       		<td>@{{entry.quantity}}</td>
	        <td class="pull-right"><button data-target="detailOutModal@{{entry.batch}}" class="btn btn-primary">Detail</button></td>
	      </tr>
	    </tbody>
	  </table>

	  	<div id="page-navigation" style="text-align: center">
	    <button class="paginatorButton" @click=movePages(-1) style="display: inline-block;">Back</button>
	    <p style="display: inline-block;">@{{startRowOut / rowsPerPageOut + 1}} out of @{{Math.ceil(data.length / rowsPerPageOut)}}</p>
	    <button class="paginatorButton" @click=movePages(1) style="display: inline-block;">Next</button>
	  </div>

	</template>

	<!-- demo root element -->
	  <form id="search">

	  	<div class="row" style="margin-right: 20px;margin-bottom: -10px">
		    <div class="col s12">
		      <div class="row">
		        <div class="input-field col s12">
		          <i class="material-icons prefix">search</i>
		          <input id="search" name="query" v-model="searchQueryOut" placeholder="Search" @keyup="resetStartRow">
		        </div>
		      </div>
		    </div>
		  </div>
	  </form>

	  <grid :data="gridDataOut | orderByBusinessRules | filterBy searchQueryOut" :columns="gridColumns" :move-pages="movePages" :start-row="startRowOut" :rows-per-page="rowsPerPageOut">

    </div> <!-- InvOut end -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
</div> <!-- main store body -->

@if(count($data)>0)
@foreach($data as $list)
<!-- detail modal -->
  <div id="detailModal{{$list->batch}}" class="modal fade">
    <div class="modal-content" style="overflow: hidden">
      
      <p><b>Batch </b>:<span> {{$list->batch}}</span></p>
      <p><b>Name </b>:<span> {{$list->name}}</span></p>
      <p><b>Date Entry </b>:<span> {{$list->created_at}}</span></p>
     
      <div class="printBody" style="overflow: hidden;">

      </div>

       <div class="pull-right" style="display: inline-block;margin-top: 30px;margin-bottom: -20px">
          <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
          <!-- <a onclick="window.print()" class="modal-action waves-effect waves-green btn-flat">Print</a> -->
        </div>
    </div>
  </div> <!-- modal -->
  @endforeach
  @endif

@endsection

@section('before-scripts-end')

<script type="text/javascript">

	var itemList = '';
	
	$(document).ready(function(){
    
    $('.modal').modal();
  });

</script>

<script type="text/javascript">

var gridData = {!!  json_encode($dataIn) !!};
var gridDataOut = {!!  json_encode($dataOut) !!};

  // register the grid component
Vue.component('grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    filterKey: String,
    movePages: Function,
    startRow: Number,
    rowsPerPage: Number,
    startRowOut: Number,
    rowsPerPageOut: Number
  },
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },

  computed: {
    filteredData: function () {
      var sortKey = this.sortKey
      var filterKey = this.filterKey && this.filterKey.toLowerCase()
      var order = this.sortOrders[sortKey] || 1
      var data = this.data
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      if (sortKey) {
        data = data.slice().sort(function (a, b) {
          a = a[sortKey]
          b = b[sortKey]
          return (a === b ? 0 : a > b ? 1 : -1) * order
        })
      }
      return data
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    },

  }
})

// bootstrap the demo
var demo = new Vue({
  el: '.store_body',
  data: {
    startRow: 0,
    rowsPerPage: 10,
    startRowOut: 0,
    rowsPerPageOut: 10,
 
    searchQuery: '',
    searchQueryOut: '',
    gridColumns: ['name', 'batch','quantity'],
    gridData: gridData,
    gridDataOut: gridDataOut,
    
  },
    ready: function () {
            // this.getDataSearch();
            // this.getDataSearchOut();
            // this.fetchdata();
  },

  methods: {

    //  getDataSearch: function() {
    //    var url = "getData";
    //    var self = this;
    //       this.get(url).done(function(data)
    //       { 
    //         self.gridData = data;
    //         console.log(data);
    //       }.bind(this)).fail(function(error)
    //       { 
    //         console.log(error);  
    //       }.bind(this)); 
    // },

    // getDataSearchOut: function() {
    //    var url = "getDataOut";
    //    var self = this;
    //       this.get(url).done(function(data)
    //       { 
    //         self.gridDataOut = data;
    //         console.log(data);
    //       }.bind(this)).fail(function(error)
    //       { 
    //         console.log(error);  
    //       }.bind(this)); 
    // },


             movePages: function(amount) {
		      var newStartRow = this.startRow + (amount * this.rowsPerPage);
		      if (newStartRow >= 0 && newStartRow < gridData.length) {
		        this.startRow = newStartRow;
		      }

		      var newStartRowOut = this.startRowOut + (amount * this.rowsPerPageOut);
		      if (newStartRowOut >= 0 && newStartRowOut < gridDataOut.length) {
		        this.startRowOut = newStartRowOut;
		      }
		    },
		    resetStartRow: function() {
		      this.startRow = 0;
		      this.startRowOut = 0;
		    },

        get:function(_url)
          {
            return $.ajax({
              url: _url, 
              type:'GET', 
              dataType:'json'
            }); 
          },
  },

  	filters: {
		    orderByBusinessRules: function(data) {
		      return data.slice().sort(function(a, b) {
		        return a.power - b.power;
		      });
		    }
		  }

})

</script>

@endsection
