<table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th style="width:40px;">
                <input type="checkbox" id="checkbox-all">
                <label for="check-all" class="labelCheckAll"></label>
            </th>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Giá sản phẩm</th>
            <th>Vị trí</th>
            <th>Ngày tạo</th>
            <th>Người tạo</th>
            <th>Hiển thị</th>
            <th style="width: 150px">#</th>
        </tr>
    </thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $v)
        <?php
            $getPrice = getPrice(array('price' =>$v->price,'price_sale' => $v->price_sale,'price_contact' =>$v->price_contact));
        ?>
        <tr class="odd" id="post-<?php echo $v->id; ?>">
            <td>
                <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                <label for="" class="label-checkboxitem"></label>
            </td>
            <td class="sorting_1">{{$data->firstItem()+$loop->index}}</td>
            <td>
                <?php echo $v->title; ?>
                <div class="list-catalogue">
                    @foreach($v->catalogues_relationships as $kc=>$c)
                    <a href="{{route('product.index',['catalogueid' => $c->id])}}" style="font-size: 10px;"><?php echo !empty($kc == 0) ? '' : ',' ?>{{$c->title}}</a>
                    @endforeach
                </div>
            </td>
            <td>
                <?php if($getPrice['price_old']){?>
                    <old style="text-decoration: line-through;"><?php echo $getPrice['price_old']?><br></old>
                <?php }?>
                <?php echo $getPrice['price_final']?>
            </td>
            @include('dashboard.components.order',['module' => 'products'])
            <td>
                @if($v->created_at)
                {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                @endif
            </td>
            <td>{{$v->user->name}}</td>
            @include('dashboard.components.publish',['module' => 'products','title' => 'publish'])
            <td>
                @can('product_edit')
                <a href="{{ route('product.edit',['id'=>$v->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                @endcan
                @can('product_destroy')
                <a href="{{ route('product.destroy',['id'=>$v->id]) }}" class="btn btn-danger ajax-delete" data-id="<?php echo $v->id ?>" data-module="products" data-child="0" data-title="Lưu ý: Khi bạn xóa thuộc tính, thuộc tính sẽ bị xóa vĩnh viễn. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!"><i class="fa fa-trash-o"></i></a>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-xs-12">
        <div class="dataTables_paginate paging_bootstrap pull-right">
            {{$data->links()}}
        </div>
    </div>
</div>