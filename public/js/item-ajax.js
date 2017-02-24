var page = 1;

var current_page = 1;

var total_page = 0;

var is_ajax_fire = 0;


manageData();


/* manage data list */

function manageData() {

    $.ajax({

        dataType: 'json',

        url: url,

        data: {page:page}

    }).done(function(data){


    	total_page = data.last_page;

    	current_page = data.current_page;


    	$('#pagination').twbsPagination({

	        totalPages: total_page,

	        visiblePages: current_page,

	        onPageClick: function (event, pageL) {

	        	page = pageL;

                if(is_ajax_fire != 0){

	        	  getPageData();

                }

	        }

	    });


    	manageRow(data.data);

        is_ajax_fire = 1;

    });

}


$.ajaxSetup({

    headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

});


/* Get Page Data*/

function getPageData() {

	$.ajax({

    	dataType: 'json',

    	url: url,

    	data: {page:page}

	}).done(function(data){

		manageRow(data.data);

	});

}


/* Add new Item table row */

function manageRow(data) {

	var	rows = '';

	$.each( data, function( key, value ) {

	  	rows = rows + '<tr>';

	  	rows = rows + '<td>'+value.title+'</td>';

	  	rows = rows + '<td>'+value.description+'</td>';

	  	rows = rows + '<td data-id="'+value.id+'">';

                rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';

                rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';

                rows = rows + '</td>';

	  	rows = rows + '</tr>';

	});


	$("tbody").html(rows);

}


/* Create new Item */

$(".crud-submit").click(function(e){

    e.preventDefault();

    var form_action = $("#create-item").find("form").attr("action");

    var title = $("#create-item").find("input[name='title']").val();

    var description = $("#create-item").find("textarea[name='description']").val();


    $.ajax({

        dataType: 'json',

        type:'POST',

        url: form_action,

        data:{title:title, description:description}

    }).done(function(data){

        getPageData();

        $(".modal").modal('hide');

        toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});

    });


});


/* Remove Item */

$("body").on("click",".remove-item",function(){

    var id = $(this).parent("td").data('id');

    var c_obj = $(this).parents("tr");

    $.ajax({

        dataType: 'json',

        type:'delete',

        url: url + '/' + id,

    }).done(function(data){

        c_obj.remove();

        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});

        getPageData();

    });

});


/* Edit Item */

$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');

    var title = $(this).parent("td").prev("td").prev("td").text();

    var description = $(this).parent("td").prev("td").text();

    $("#edit-item").find("input[name='title']").val(title);

    $("#edit-item").find("textarea[name='description']").val(description);

    $("#edit-item").find("form").attr("action",url + '/' + id);

});


/* Updated new Item */

$(".crud-submit-edit").click(function(e){

    e.preventDefault();

    var form_action = $("#edit-item").find("form").attr("action");

    var title = $("#edit-item").find("input[name='title']").val();

    var description = $("#edit-item").find("textarea[name='description']").val();


    $.ajax({

        dataType: 'json',

        type:'PUT',

        url: form_action,

        data:{title:title, description:description}

    }).done(function(data){

        getPageData();

        $(".modal").modal('hide');

        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});

    });

});

Ok, now we are ready for check, so let's test.....



Tags :
Ajax
Twitter Bootstrap
Source Code
CRUD
Demo
Example
jQuery
Laravel
Laravel 5
Laravel 5.2
toastr js
validator.js
We are Recommending you:

    Laravel 5 and Vue JS CRUD with Pagination example and demo from scratch
    Laravel 5.2 - User ACL Roles and Permissions with Middleware using entrust from Scratch Tutorial
    CRUD (Create Read Update Delete) Example in Laravel 5.2 from Scratch
    Laravel 5.2 and AngularJS CRUD with Search and Pagination Example.

Random Post

    How to use where clause with mysql function in Laravel 5?
    Laravel 5 Google OAuth authentication using Socialite Package
    How to Uninstall a Package in Laravel 5 Using Composer Command?
    Select box with search option example in Jquery using Chosen Plugin
    PHP AngularJS CRUD with Search and Pagination Example From Scratch
    Mediafire PHP file uploading and get link example
    Laravel 5 clear cache from route, view, config and all cache data from application
    How to increment or decrement a column value in laravel?


	
	

Subscribe Your Email address:
Connect with us on FB
Popular Posts

    How to use elasticsearch from scratch in laravel 5?
    How to get file size from URL in Laravel 5?
    HTML/FORM not found in Laravel 5?
    How to create and use Middleware in Laravel 5?
    Laravel 5 - where condition with two columns example code
    How to get url segment in Laravel 5?
    How to check uploaded file is empty or not in Laravel 5.3?
    Jquery Datepicker example code with demo using Jquery UI

Categories

    Laravel
    PHP
    jQuery
    Javascript
    Bootstrap
    HTML
    MySql
    AngularJS
    Ajax
    Ubuntu
    Installation
    Git
    CSS
    JSON
    Codeigniter
    Node JS
    Google API
    JQuery UI
    Google Map
    SQL
    Elasticsearch
    Server
    Wampserver
    Ionic Framework
    Sublime
    Twitter API
    Pingpong
    MSSQL
    Socket.io
    Highcharts
    JWT
    Apache
    Bitbucket
    Bootbox.js
    Typeahead JS
    Chosen JS
    Instagram API
    Amazon API
    .htaccess
    Rakuten Marketing API
    Maatwebsite
    Redis
    CURL
    Sitemap
    Parsley JS
    Facebook API
    Mediafire API
    Chart JS
    Other
    Mailgun API
    Sendgrid
    Dropbox API
    Tagsinput JS
    Linkedin API
    Mailchimp API
    Opencart
    Vue.JS
    Behance API

Connect with us on Tweeter
Latest Posts

    Laravel 5 - Example of Database Seeder with insert sample data
    How to copy to clipboard without flash in AngularJS ?
    Codeigniter 3 - CRUD(Create, Read, Update and Delete) using JQuery Ajax, Bootstrap, Models and MySQL
    How to integrate stripe payment gateway in Laravel 5.4 Application ?
    How to get keys name from array using array helper in PHP Laravel ?

Advertisement

