
@extends('layouts.admin')
@section('content')
    <style>
        .time {
            position: relative;
            right: 265px;
            top:-0px;
            line-height:10px;
        }
        .srhTxt {
            position: relative;
            left:300px;
            top:-54px;
        }


    </style>
    <!--content S-->
    <div class="super-content RightMain" id="RightMain" >

        <!--header-->
        <div class="superCtab">
            <div class="ctab-title clearfix"><h3>众筹管理</h3><a href="javascript:;" class="sp-column"><i class="ico-mng"></i>栏目管理</a></div>

            <div class="ctab-Main">
                <div class="ctab-Main-title">

                    <ul class="clearfix">


                        <li class="cur">众筹管理</li>


                    </ul>
                </div>

                <div class="ctab-Mian-cont">
                    <div class="Mian-cont-btn clearfix">

                        <!-- 关键字搜索 -S -->
                        <div class="searchBar">
                            <form action="" method="get">
                                <div class="time">
                                    类型：<select name="acc" style="width:90px; height:35px; font-size:16px;">
                                    <option  value="" selected="selected">全部</option>
                                    <option  value="农业" @if($req->acc=='农业') selected="selected" @endif>农业</option>
                                    <option  value="公益" @if($req->acc=='公益') selected="selected" @endif>公益</option>
                                    </select>

                                    添加时间:
                                    从 <input type="text" name="from" style="border:1px solid #ccc;" value="{{ $req->from }}">到
                                    <input type="text" name="to" style="border:1px solid #ccc;" value="{{ $req->to }}">
                                    </div>
                                <br>

                                <input type="text" name="keyword" value="{{ $req->keyword }}" class="form-control srhTxt" placeholder="输入关键字搜索">
                                <input type="submit" class="srhBtn" value="">

                            </form>
                        </div>
                        <!-- 关键字搜索 -E-->
                    </div>


                    <div class="Mian-cont-wrap">
                        <div class="defaultTab-T">
                            <table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
                                <tbody><tr>
                                    <th class="t_1">ID</th>
                                    <th class="t_3">标题</th>
                                    <th class="t_3">发布时间
                                        @if($req->od=='asc')
                                            <a href="{{  route('admin.crowd',  array_merge(  $req->all() ,  ['od'=>'desc']    )  )  }}" > ⬇⬇ </a>
                                        @else
                                            <a href="{{  route('admin.crowd',  array_merge(  $req->all() ,  ['od'=>'asc']      )  )  }}" > ⬆⬆ </a>
                                        @endif
                                    </th>
                                    <th class="t_3">修改时间</th>
                                    <th class="t_4">操作</th>
                                </tr>
                                </tbody></table>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
                            <tbody>
                            @foreach($blogs as $v)
                                <tr>
                                    <td class="t_1">{{ $v->id }}</td>
                                    <td class="t_1">{{ $v->title }}</td>
                                    <td class="t_3">{{$v->created_at}}</td>
                                    <td class="t_3">{{$v->updated_at}}</td>



                                    <td class="t_4">
                                        <div class="btn">
                                            @if($v->is_top == 1)
                                                <a href="#" id="Top{{$v->id}}" class="Top article-top" onClick="saveIsTopState({{$v->id}},0)">取消置顶</a>

                                            @else
                                                <a href="#" id="Top{{$v->id}}" class="Top article-top" onClick="saveIsTopState({{$v->id}},1)" >置顶</a>

                                            @endif
                                            <a href="{{route('crowd',['id'=>$v->id])}}" target="view_window" class="modify">查看</a>
                                            {{--<a href="" class="modify">置顶</a>--}}
                                            <a onclick="return confirm('确定要删除吗？');" href="{{ route('crowd.delete' , ['id' => $v->id]) }}" class="delete">删除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7"> {{ $blogs->appends( $req->all() )->links() }} </td>
                            </tr>

                            </tbody></table>
                        <!--pages S-->
                        <div>
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                        <!--pages E-->
                    </div>

                </div>
            </div>
        </div>
        <!--main-->

    </div>
    <!--content E-->


    </body></html>
    <script src="/admin/js/jquery-3.2.1.min.js"></script>
    <script src="/admin/js/layer/layer.js"></script>
    <script>

        function saveIsTopState(art_id,value){
            var x=art_id;
            var y=value;
            $.get("/admin/top/"+x+"-"+y,function(data){


                if(value*1){


                    layer.msg('设置成功', {time:1000},function(){

                    });

                    $("#Top"+art_id).html("取消置顶");
                    $("#Top"+art_id).attr("onClick","saveIsTopState("+art_id+",0)");
                }else{
                    $("#Top"+art_id).html("置顶");
                    $("#Top"+art_id).attr("onClick","saveIsTopState("+art_id+",1)");
                }
            });
        }
    </script>

@endsection