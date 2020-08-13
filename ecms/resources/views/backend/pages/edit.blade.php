@extends('backend.layout')
@section('content')
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Page Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('page.update',$pages->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      {{method_field('PUT')}}

               @isset($pages->page_file)
                <div class="form-group">
                 <label>Yüklü Görsel</label>
                 <div class="row">
                 <div class="col-xs-12">
                    <img src="/images/pages/{{$pages->page_file}}" width="100" alt="">
                    
                    </div>
                      </div> 
                         </div>
               @endisset

                <div class="form-group">
                 <label>Resim seç</label>
                 <div class="row">
                 <div class="col-xs-12">
                    <input class="form-control" name="page_file" required type="file" value="{{$pages->page_file}}>
                    
                    </div>
                      </div> 
                        </div>

                 <div class="form-group">
                <label>Başlık</label>
                 <div class="row">
                 <div class="col-xs-12">
                    <input class="form-control"  type="text" name="page_title" value="{{$pages->page_title}}">
                    </div>
                    </div> 
                    </div>

                    <div class="form-group">
                <label>Slug</label>
                 <div class="row">
                 <div class="col-xs-12">
                    <input class="form-control"  type="text" name="page_slug" value="{{$pages->page_slug}}">
                    </div>
                    </div> 
                    </div>

                    <div class="form-group">
                 <label>İçerik</label>
                 <div class="row">
                 <div class="col-xs-12">

<textarea class="form-control" id="editor1" name="page_content">{{$pages->page_title}}</textarea>
<script>
CKEDITOR.replace('editor1');
</script>
                
                    </div>
                    </div>
                    

                    
                    <div class="form-group">
                 <label>İçerik</label>
                 <div class="row">
                 <div class="col-xs-12">
                    <select name="page_status" class="form-control">
                    <option {{$pages->page_status=="1" ? "selected=''":""}} value="1">Aktif</option>
                    <option {{$pages->page_status=="0" ? "selected=''":""}} value="0">Pasif</option>
                    </select>
                  
                    </div>
                      </div>  
                      <input type="hidden" name="old_file" value="{{$pages->page_file}}">   
                 
                      <div  class="box-footer" align="right">
                            <button type="submit" class="btn btn-success">Düzenle</button>
                            </div>


                        </div>
                    

                        </form>
        </div>
        </div>
    </section>



    @endsection
@section('css')@endsection
@section('js')@endsection
