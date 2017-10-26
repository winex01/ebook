@extends('layouts.admin.master')


@section('content')

  @include('layouts.version')
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          {{-- breadcramps --}}
          <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          </ol>
          {{-- / brandcramps --}}

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <!-- Small boxes (Stat box) -->
          <div class="row">
            
            @foreach($boxes as $box)
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box {{ $box['color'] }}">
                  <div class="inner">
                    <h3>{{ $box['total'] }}</h3>

                    <p>{{ $box['header'] }}</p>
                  </div>
                  <div class="icon">
                    <i class="{{ $box['icon'] }}"></i>
                  </div>
                  <a href="{{ $box['route'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            @endforeach

          </div>
          <!-- /.row -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{-- Footer --}}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection