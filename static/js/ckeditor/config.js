/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    /*config.uiColor = '#3f719e';*/
    config.removePlugins = 'iframe,about,forms,flash,link,newpage,pagebreak';
    config.mathJaxLib = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML';
    config.extraPlugins ='widget,lineutils,widgetselection,mathjax';
    config.skin = 'office2013';
};
