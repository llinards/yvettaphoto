<input type="file" class="form-control-file" name="multiple-img-upload[]" id="multiple-img-upload">

<script>
  FilePond.registerPlugin(FilePondPluginFileValidateType);
  FilePond.registerPlugin(FilePondPluginFileValidateSize);
  FilePond.registerPlugin(FilePondPluginImagePreview);
  FilePond.create(document.querySelector('input[id="multiple-img-upload"]'));
  FilePond.setOptions({
    server: {
      url: '/admin/upload',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    },
    allowMultiple: true,
    allowReorder: true,
    maxFileSize: '1MB',
    allowImagePreview: true,
    acceptedFileTypes: ['image/*'],
  });
</script>
