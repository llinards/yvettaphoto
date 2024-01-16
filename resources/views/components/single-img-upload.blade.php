<input type="file" class="form-control-file" name="single-img-upload" id="single-img-upload">

<script>
  FilePond.registerPlugin(FilePondPluginFileValidateType);
  FilePond.registerPlugin(FilePondPluginFileValidateSize);
  FilePond.registerPlugin(FilePondPluginImagePreview);
  FilePond.create(document.querySelector('input[id="single-img-upload"]'));
  FilePond.setOptions({
    server: {
      url: '/admin/upload',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    },
    maxFileSize: '1MB',
    allowImagePreview: true,
    acceptedFileTypes: ['image/*'],
  });
</script>
