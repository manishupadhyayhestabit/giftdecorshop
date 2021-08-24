// JavaScript Document
$(document).ready(function() {
	function closeflash(){ 
		$('#messages').hide();
		return false;
		}
	});
$(document).ready(function() {
	$('.delete_item').click(function(){
		if (confirm("Are you sure?")) {
			var rel = $(this).attr('rel');
			window.location.href = rel;
			}
		return false; 
		});
	});
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
	$(".notification  a").attr("href", "javascript:;")
	});
	
$(document).ready(function() {
	$('#messages').click(function(){
		$('#messages').hide();
		return false; 
		});
	});

$(document).ready(function() {
	// Override summernotes image manager
	$('.summernote').each(function() {
		var element = this;
		$(element).summernote({
			disableDragAndDrop: true,
			height: 300,
			emptyPara: '',
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'image', 'video']],
				['view', ['fullscreen', 'codeview', 'help']]
			],
			buttons: {
    			image: function() {
					var ui = $.summernote.ui;
					// create button
					var button = ui.button({
						contents: '<i class="note-icon-picture" />',
						tooltip: $.summernote.lang[$.summernote.options.lang].image.image,
						click: function () {
							$('#modal-image').remove();
							$.ajax({
								url: '/store/file-manager/file-manager',
								dataType: 'html',
								beforeSend: function() {
									$('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
									$('#button-image').prop('disabled', true);
									},
								complete: function() {
									$('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
									$('#button-image').prop('disabled', false);
									},
								success: function(html) {
									$('body').append('<div id="modal-image" class="modal">' + html + '</div>');
									$('#modal-image').modal('show');
									$('#modal-image').delegate('a.thumbnail', 'click', function(e) {
										e.preventDefault();
										$(element).summernote('insertImage', $(this).attr('href'));
										$('#modal-image').modal('hide');
										});
									}
								});						
							}
						});
					return button.render();
					}
  				}
			});
		});
	});
function isValidEmailAddress(emailAddress) {

		var patternEmail = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,20}$/i);

		if (patternEmail.test(emailAddress)) {

				return true;

			}else{

				return false;

			}

	};

	

function checkEmail(thisobj){

		var identifire = thisobj.id;

		var email = thisobj.value;

		if(!isValidEmailAddress(email)){

			$('#'+identifire+'_error').show();

			$('#'+identifire).addClass('error');

		}

	}

	

function hideError(thisobj){

		var identifire = thisobj.id;

		$('#'+identifire+'_error').hide();

		$('#'+identifire).removeClass('error');

	}

	

function validatePhone(phoneVal){

		if(phoneVal!=''){

			var phoneRegExp = /^[\-\+\(\)0-9 ]*$/;

			var numbers = phoneVal.split("").length;

			var numbers = phoneVal.length;

			if (9 <= numbers && numbers <= 14 && phoneRegExp.test(phoneVal)) {

				return true;

			}else{

				return false;

			}

		}

	}



function isNumber(num){

		if(num!=''){

		 regex=/^[0-9]+$/;

			if (num.match(regex))

   			 {

       		 return true;

    		}else{

			return false;

			}

		}

	}

	

function isWebsiteUrl(Urltext){		

		var urlregex =  /\(?(?:(http|https|ftp):\/\/)?(?:((?:[^\W\s]|\.|-|[:]{1})+)@{1})?((?:www.)?(?:[^\W\s]|\.|-)+[\.][^\W\s]{2,4}|localhost(?=\/)|\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(?::(\d*))?([\/]?[^\s\?]*[\/]{1})*(?:\/?([^\s\n\?\[\]\{\}\#]*(?:(?=\.)){1}|[^\s\n\?\[\]\{\}\.\#]*)?([\.]{1}[^\s\?\#]*)?)?(?:\?{1}([^\s\n\#\[\]]*))?([\#][^\s\n]*)?\)?/;

		urlRule = /^(http:\/\/|https:\/\/|ftp:\/\/|www.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,50}(:[0-9]{1,50})?(\/.*)?$/i;

		if(urlregex.test(Urltext)){

			return true;

		} else {

			return false;

		}

	}



function isIpUrl(Urltext){  

		var urlRule = /^(http:\/\/|https:\/\/|ftp:\/\/|www.)(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})(.*)$/i ;

		if(Urltext.match(urlRule)){

			return true;

		} else {

			return false;

		}

	}
	