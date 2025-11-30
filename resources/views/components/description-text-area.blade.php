<textarea class="form-control" id="description-textarea" name="description-textarea"
          rows="3">{{$slot}}</textarea>

<script type="module">
  const LICENSE_KEY = 'GPL';
  const editorConfig = {
    toolbar: {
      items: ['bold', 'italic', 'underline', 'superscript', '|', 'bulletedList',
        'numberedList', '|', 'link', 'blockQuote', '|', 'sourceEditing'],
      shouldNotGroupWhenFull: false,
    },
    plugins: [AutoLink, Autosave, BlockQuote, Bold, Essentials, Italic, Link, Paragraph, Superscript, Underline, SourceEditing, List],
    licenseKey: LICENSE_KEY,
    link: {
      addTargetToExternalLinks: true,
      defaultProtocol: 'https://',
      decorators: {
        toggleDownloadable: {
          mode: 'manual',
          label: 'Downloadable',
          attributes: {
            download: 'file',
          },
        },
      },
    },
  };

  ClassicEditor.create(document.querySelector('#description-textarea'), editorConfig);
</script>

