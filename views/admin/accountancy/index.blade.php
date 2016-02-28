@extends('layout.master_admin')

@section('content')
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('partial.error')
                <div class="nav-tabs-custom">
                    <h2 class="box-title">
                        <div class="form-group">
                            <label>Bu Alanda İşletme Seçebilirsinz</label>
                            <select id='selectAccountancy' class="form-control">
                                @foreach($companies as $key => $company)
                                    <option value="{!! $key !!}">{!! $company->title !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </h2>
                    <ul class="nav nav-tabs" id="companiesAccountancy" style="display: none;">
                        @foreach($companies as $key => $company)
                            <li{!! $key==0?' class="active" ':null !!}><a href="#tab_{!! $key+1 !!}" data-toggle="tab" aria-expanded="true">{!! $company->title !!}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($companies as $key => $company)
                            <div class="tab-pane{!! $key==0?' active':null !!}" id="tab_{!! $key+1 !!}">
                                <h2>{!! $company->title !!}</h2>
                                @if(count($company->accountancy()->get())>0)
                                    <table class="table-bordered table">
                                        <tbody>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Açıklama</th>
                                                <th>Borç</th>
                                                <th>Alacak</th>
                                                <th>Bakiye</th>
                                                <th></th>
                                            </tr>
                                            <?php $total=[]; $debt_total=[]; $receivable_total=[]; ?>
                                            @foreach($company->accountancy()->get() as $acc)
                                                <tr>
                                                    <th>
                                                        {!! $acc->humandate !!}
                                                    </th>
                                                    <th>
                                                        <?php
                                                            $tooltip = strlen($acc->description)>50?'data-toggle="tooltip" title="'.$acc->description.'" data-placement="bottom"':null;
                                                        ?>
                                                        <p {!! $tooltip !!}>
                                                            {!! str_limit($acc->description, 50, '...') !!}
                                                        </p>
                                                        @if($acc->slug != '')
                                                            @foreach(explode('|', $acc->slug) as $key => $file)
                                                                <a href="/admin/accountancy/file/{!! $acc->id !!}/{!! class_basename($file) !!}">Ek - {!! $key+1 !!}</a>
                                                            @endforeach
                                                        @endif
                                                    </th>
                                                    <th>{!! $acc->debt !!}</th>
                                                    <th>{!! $acc->receivable!!}</th>
                                                    <?php
                                                        empty($acc->receivable)?$acc->receivable=0:$acc->receivable;
                                                        empty($acc->debt)?$acc->debt=0:$acc->debt;
                                                        $debt_total[] = intval($acc->debt);
                                                        $receivable_total[] = intval($acc->receivable);
                                                        $total[]= $balance = intval($acc->debt)-intval($acc->receivable);
                                                    ?>
                                                    <th>{!! array_sum($total)!!}</th>
                                                    <th>
                                                        <ul class="list-group pull-right">
                                                            <!-- DELETE BUTTON -->
                                                            {!! Form::open(['url' => '/admin/accountancy/'.$acc->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                                            {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                                            {!! Form::close() !!}
                                                                    <!-- EDIT BUTTON -->
                                                            <a class="pull-right" href="/admin/accountancy/{!! $acc->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                                                        </ul>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>{!! array_sum($debt_total) !!}</th>
                                            <th>{!! array_sum($receivable_total) !!}</th>
                                            <th>{!! array_sum($total) !!}</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <p>Bu İşletmeye Ait Hesap Bulunmamaktadır</p>
                                @endif
                                <table class="table-bordered table">
                                    <tbody>
                                    <tr>
                                        <th>Tarih</th>
                                        <th>Açıklama</th>
                                        <th>Borç</th>
                                        <th>Alacak</th>
                                        <th></th>
                                    </tr>
                                    {{-- Accountancy Form --}}
                                    <tr>
                                        {!! Form::open(['url' => '/admin/accountancy', 'method'=>'POST', 'file'=>'true', 'enctype'=>'multipart/form-data'])!!}
                                            <th>
                                                <div class="form-group">
                                                    {!! Form::input('date', 'date', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Açıklama']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::file('attach', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    {!! Form::text('debt', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    {!! Form::text('receivable', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                                                </div>
                                            </th>
                                            <th>
                                                <div>
                                                    {!! Form::button('Kaydet', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
                                                </div>
                                            </th>
                                        <input type="hidden" name="company" value="{!! $company->id !!}">
                                        {!! Form::close() !!}
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

