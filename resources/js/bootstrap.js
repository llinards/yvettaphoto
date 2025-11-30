import _ from 'lodash';
import * as FilePond from 'filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import Masonry from 'masonry-layout';
import Popper from 'popper.js';
import jQuery from 'jquery';
import 'bootstrap';
import axios from 'axios';
import fslightbox from 'fslightbox';
import {
  AutoLink,
  Autosave,
  BlockQuote,
  Bold,
  ClassicEditor,
  Essentials,
  Italic,
  Link,
  List,
  Paragraph,
  SourceEditing,
  Superscript,
  Underline,
} from 'ckeditor5';
import 'ckeditor5/ckeditor5.css';

window._ = _;
window.Masonry = Masonry;
window.FilePond = FilePond;
window.FilePondPluginFileValidateType = FilePondPluginFileValidateType;
window.FilePondPluginImagePreview = FilePondPluginImagePreview;
window.FilePondPluginFileValidateSize = FilePondPluginFileValidateSize;
window.Popper = Popper.default || Popper;
window.$ = window.jQuery = jQuery;
window.axios = axios;
window.fslightbox = fslightbox;

window.ClassicEditor = ClassicEditor;
window.AutoLink = AutoLink;
window.Autosave = Autosave;
window.BlockQuote = BlockQuote;
window.Bold = Bold;
window.Essentials = Essentials;
window.Italic = Italic;
window.Link = Link;
window.List = List;
window.Paragraph = Paragraph;
window.Superscript = Superscript;
window.Underline = Underline;
window.SourceEditing = SourceEditing;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
