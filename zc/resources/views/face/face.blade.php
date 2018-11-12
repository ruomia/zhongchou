@extends('layouts.main')

@section('title','设置头像')

@section('content')

    <style>
        .img-container {
            width: 240px;
            height: 240px;
            float:left;
        }
        .img-container #pre_image {
            width: 100%;
        }
        .img-preview {
            float: left;
            overflow: hidden;
            margin-left: 20px;
        }

        .preview-lg {
            width: 240px;
            height: 240px;
        }

        .preview-md {
            width: 80px;
            height: 80px;
        }

        .preview-sm {
            width: 35px;
            height: 35px;
        }
    </style>

    <div class="container">
        <h1>设置头像</h1>
        @if(session('bgface'))
            <img src="{{  Storage::url(session('bgface'))    }}">
        @else
            <img src="/images/face.jpg" alt="">
        @endif

        <form action="{{ route('setface') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-div">
                <input type="file" name="face">
            </div>
            <!-- 预览图片区域 -->
            <div class="img-container">
                <img id="pre_image">
            </div>
            <!-- 三个缩略图预区域 -->
            <div class="docs-preview clearfix">
                <div class="img-preview preview-lg"></div>
                <div class="img-preview preview-md"></div>
                <div class="img-preview preview-sm"></div>
            </div>
            <!-- 保存裁切参数的四个框 -->
            <input type="hidden" name="x">
            <input type="hidden" name="y">
            <input type="hidden" name="w">
            <input type="hidden" name="h">

            <div class="form-div">
                <input type="submit" value="确认">
            </div>
        </form>
    </div>

    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/cropper.min.css">
    <script src="/js/cropper.min.js"></script>
    <script>

        var preImg = $("#pre_image");
        // 获取裁切时的四个框
        var x = $("input[name=x]");
        var y = $("input[name=y]");
        var w = $("input[name=w]");
        var h = $("input[name=h]");
        // 选择图片时预览图片 并 调用cropper插件
        $("input[name=face]").change(function(){
            // 先消毁，清除一下插件，否则连续调用插件时会失败
            preImg.cropper("destroy");
            // this.files[0]：获取当前图片并转成URL地址
            var url = getObjectUrl( this.files[0] );
            console.log( url )
            // 设置url到预览图片上
            preImg.attr('src', url);
            // 调出插件
            preImg.cropper({
                aspectRatio: 1,         // 裁切的框形状
                preview:'.img-preview',    // 显示预览的位置
                viewMode:3,                // 显示模式：图片不能无限缩小，但可以放大
                // 裁切时把参数保存到表单中
                crop: function(event) {
                    x.val( event.detail.x );
                    y.val( event.detail.y );
                    w.val( event.detail.width );
                    h.val( event.detail.height );
                }
            });
        });
        // 预览时需要使用下面这个函数转换一下
        function getObjectUrl(file) {
            var url = null;
            if (window.createObjectURL != undefined) {
                url = window.createObjectURL(file)
            } else if (window.URL != undefined) {
                url = window.URL.createObjectURL(file)
            } else if (window.webkitURL != undefined) {
                url = window.webkitURL.createObjectURL(file)
            }
            return url
        }




    </script>




@endsection
