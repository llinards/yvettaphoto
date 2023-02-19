@extends('layouts.admin-default',['title' => 'Rediģēt CV'])
@section('content')
  <div class="container admin-container">
    @include('inc.status-messages')
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Rediģēt CV</h2>
      </div>
    </div>
    <div class="row justify-content-center m-2">
      <div class="col-12">
        <form action="/admin/cv" enctype="multipart/form-data" method="post">
          @csrf
          @method('PATCH')
          <input type="text" style="display: none;" name="id" value="{{ $cv->id }}">
          <div class="form-group">
            @error('cv-content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" id="cv-content" name="cv-content">{{ $cv->content }}</textarea>

          </div>
          <button type="submit" class="btn btn-success">Atjaunot</button>
          <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
        </form>
      </div>
    </div>
  </div>
  <script>
    CKEDITOR.replace('cv-content', {
      toolbarGroups: [
        {name: 'document', groups: ['mode', 'document', 'doctools']},
        {name: 'clipboard', groups: ['clipboard', 'undo']},
        {name: 'editing', groups: ['find', 'selection', 'spellchecker', 'editing']},
        {name: 'forms', groups: ['forms']},
        '/',
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']},
        {name: 'links', groups: ['links']},
        {name: 'insert', groups: ['insert']},
        '/',
        {name: 'styles', groups: ['styles']},
        {name: 'colors', groups: ['colors']},
        {name: 'tools', groups: ['tools']},
        {name: 'others', groups: ['others']},
        {name: 'about', groups: ['about']}
      ],
      format_tags: 'p;h1;h2;h3;h4',
      removeButtons: 'Source,Save,Templates,NewPage,Preview,Print,Find,Replace,Scayt,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Image,Flash,Table,Smiley,SpecialChar,PageBreak,Iframe,Styles,Font,TextColor,BGColor,ShowBlocks,About'
    });
  </script>
@endsection
