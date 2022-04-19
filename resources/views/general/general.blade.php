@extends('dashboard.layout.dashboard')

@section('title')
<title>Cấu hình hệ thống</title>

@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Cấu hình hệ thống','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<form method="post" action="{{route('general.store')}}" class="form-horizontal box">

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-pills mb20">
                    <?php if (isset($tab) && is_array($tab) && count($tab)) { ?>
                        <?php $i = 0;
                        foreach ($tab as $key => $val) {
                            $i++; ?>
                            <li class="<?php if ($i == 1) { ?>active<?php } ?>"><a style="color: #333" data-toggle="pill" href="#home<?php echo $key ?>"><?php echo $val['label']; ?></a>
                            </li>
                    <?php }
                    } ?>
                </ul>
                <div class="tab-content">
                    @csrf
                    <?php if (isset($tab) && is_array($tab) && count($tab)) { ?>
                        <?php $i = 0;
                        foreach ($tab as $key => $val) {
                            $i++; ?>
                            <div id="home<?php echo $key ?>" class="tab-pane fade in <?php if ($i == 1) { ?>active<?php } ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="panel-head">
                                            <h2 class="panel-title"><?php echo $val['label']; ?></h2>
                                            <div class="panel-description">
                                                <?php echo $val['description']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <?php if (isset($val['value']) && is_array($val['value']) && count($val['value'])) { ?>
                                            <div class="ibox m0">
                                                <div class="ibox-content">
                                                    <?php foreach ($val['value'] as $keyItem => $valItem) { ?>
                                                        <div class=" mb15">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                                        <label class="control-label text-left">
                                                                            <span><?php echo $valItem['label']; ?><?php echo (isset($valItem['title'])) ? '<a target="_blank" style="font-weight:normal;text-decoration:underline;font-size:12px;font-style:italic;" href="' . $valItem['link'] . '" title="">(' . $valItem['title'] . ')</a>' : ''; ?></span>
                                                                        </label>
                                                                        <?php if (isset($valItem['id'])) { ?>
                                                                            <span style="color:#9fafba;"><span id="<?php echo $valItem['id']; ?>"><?php echo strlen(slug(isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '')) ?></span> <?php echo (isset($valItem['extend'])) ? $valItem['extend'] : ''; ?></span>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <?php
                                                                    if ($valItem['type'] == 'text') {
                                                                        echo Form::text('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control ' . ((isset($valItem['class'])) ? $valItem['class'] : '') . '']);
                                                                    } else if ($valItem['type'] == 'textarea') {
                                                                        echo Form::textarea('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control ' . ((isset($valItem['class'])) ? $valItem['class'] : '') . '']);
                                                                    } else if ($valItem['type'] == 'images') {
                                                                        echo Form::text('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control 1' . ((isset($valItem['class'])) ? $valItem['class'] : '') . '', 'onclick' => 'openKCFinder(this)']);
                                                                    } else if ($valItem['type'] == 'files') {
                                                                        echo Form::text('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control 1' . ((isset($valItem['class'])) ? $valItem['class'] : '') . '', 'onclick' => "openKCFinder(this, 'files')"]);
                                                                    } else if ($valItem['type'] == 'media') {
                                                                        echo Form::text('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control 1' . ((isset($valItem['class'])) ? $valItem['class'] : '') . '', 'onclick' => "openKCFinder(this, 'media')"]);
                                                                    } else if ($valItem['type'] == 'editor') {
                                                                        echo Form::textarea('config[' . $key . '_' . $keyItem . ']', isset($systems[$key . '_' . $keyItem]) ? htmlspecialchars_decode($systems[$key . '_' . $keyItem]) : '', ['id' => '' . $key . '_' . $keyItem . '', 'class' => 'ck-editor', 'style' => 'height:60px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px']);
                                                                    } else if ($valItem['type'] == 'dropdown') {
                                                                        echo Form::select('config[' . $key . '_' . $keyItem . ']', $valItem['value'], isset($systems[$key . '_' . $keyItem]) ? $systems[$key . '_' . $keyItem] : '', ['class' => 'form-control', 'style' => 'width: 100%;']);
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <hr>
                            </div>
                    <?php }
                    } ?>
                    <div class="clearfix">
                        <button type="submit" name="save" value="save" class="btn btn-success block m-b pull-right">Lưu thay
                            đổi
                        </button>
                    </div>
                </div>


                </ul>
            </div>
        </div>
    </section>
</form>
<style>
    .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
        float: left;
        width: 100%;
    }

    .panel-title {
        font-size: 20px;
        margin: 0 0 15px 0;
        font-weight: 500;
        color: #1a1a1a;
    }

    .panel-description {
        font-size: 13px;
    }

    .mb20 {
        margin-bottom: 20px;
    }
    .panel-head{
        padding: 0px 15px;
    }
</style>
@endsection