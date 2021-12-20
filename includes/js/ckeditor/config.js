/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'mathjax';
	config.mathJaxLib = 'http://duocthu.vinagon.com/includes/js/mathjax2/MathJax.js?config=TeX-AMS_HTML-full';
};
