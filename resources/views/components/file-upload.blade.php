<input type="file" class="form-control-file" name="{{($type === 'single-image') ? $type : $type.'[]'}}" id="{{$type}}">

<script>
  const fileUpload = document.getElementById('{{$type}}');
  const fileId = fileUpload.getAttribute('id');
  FilePond.registerPlugin(FilePondPluginFileValidateType);
  FilePond.registerPlugin(FilePondPluginFileValidateSize);
  FilePond.registerPlugin(FilePondPluginImagePreview);

  const options = {
    server: {
      url: '/admin/bildes/temp/upload',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    },
    maxFileSize: '1MB',
    allowImagePreview: true,
    acceptedFileTypes: ['image/*'],
  };

  const optionsConfig = {
    "single-image": {
      labelIdle: 'Pievienot bildi',
    },
    "multiple-images": {
      labelIdle: 'Pievienot bildes',
      allowMultiple: true,
      allowReorder: true,
    }
  }
  if (optionsConfig[fileId]) {
    Object.assign(options, optionsConfig[fileId]);
  }
  FilePond.create(fileUpload, options);
</script>
