@extends('layouts.template')
@section('content')
<div class="card">
<div class="card-header">
<h3 class="card-title">List of items</h3>
<div class="card-tools">
<button onclick="modalAction('{{ url('/goods/import') }}')" class="btn btninfo">Import Goods</button>
<a href="{{ url('/item/create') }}" class="btn btn-primary">Add Data</a>
<button onclick="modalAction('{{ url('/item/create_ajax') }}')" class="btn
btn-success">Add Data (Ajax)</button>
</div>
</div>
<div class="card-body">
<!-- for Data filter -->
<div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
<div class="row">
<div class="col-md-12">
<div class="form-group form-group-sm row text-sm mb-0">
<label for="filter_date" class="col-md-1 col-formlabel">Filter</label>
<div class="col-md-3">
<select name="filter_kategori" class="form-control formcontrol-sm filter_kategori">
<option value="">- All -</option>
@foreach($kategori as $l)
<option value="{{ $l->kategori_id }}">{{ $l-
>kategori_nama }}</option>
@endforeach
</select>
<small class="form-text text-muted">Item Category</small>
</div>
</div>
</div>
</div>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<table class="table table-bordered table-sm table-striped table-hover"
id="table-item">
<thead>
<tr><th>No</th><th>Item Code</th><th>Item Code</th><th>Purchase
Price</th><th>Selling Price</th><th>Category</th><th>Action</th></tr>
</thead>
<tbody></tbody>
</table>
</div>
</div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static"
data-keyboard="false" data-width="75%"></div>
@endsection
@push('js')
<script>
    function modalAction(url = ''){
    $('#myModal').load(url,function(){
    $('#myModal').modal('show');
    });
    }
    var tableGoods;
    $(document).ready(function(){
    tableItem = $('#table-item'). DataTable({
    True,
    serverSide: true,
    Ajax: {
    "url": "{{ url('item/list') }}",
    "dataType": "json",
    "type": "POST",
    "data": function (d) {
    d.filter_kategori = $('.filter_kategori').val();
    }
    },
    Columns: [{
    Date: "No_Urut",
    className: "text-center",
    width: "5%",
    Orderable: False.
    searchable: false
    },{
    Date: "barang_kode",
    className: "",
    width: "10%",
    orderable: true,
    Searchable: True
    },{
    Date: "barang_nama",
    className: "",
    width: "37%",
    orderable: true,
    searchable: true,
    },{
    Date: "harga_beli",
    className: "",
    width: "10%",
    orderable: true,
    searchable: false.
    render: function(data, type, row){
    return new Intl.NumberFormat('id-ID').format(data);
    }
    },{
    Date: "harga_jual",
    className: "",
    width: "10%",
    orderable: true,
    searchable: false.
    render: function(data, type, row){
    return new Intl.NumberFormat('id-ID').format(data);
    }
    },{
    Date: "kategori.kategori_nama",
    className: "",
    Size: "14%",
    orderable: true,
    searchable: false
    },{
    data: "action",
    className: "text-center",
    Size: "14%",
    Orderable: False.
    searchable: false
}
]
});
$('#table-barang_filter input').unbind().bind().on('keyup', function(e){
if(e.keyCode == 13){ enter key
tableItem.search(this.value).draw();
}
});
$('.filter_kategori').change(function(){
tableItem.draw();
});
});
</script>
@endpush