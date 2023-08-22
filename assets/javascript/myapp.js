// const
const baseurl = "http://localhost/deux"; //jangan akhiri dengan slash

//navigation scroll
$(window).scroll(() => {
  if ($(window).scrollTop() > 150) {
    $(".navigasi1").addClass("nav_scroll_visible");
    $(".nav_search1").addClass("srch_scroll_visible");
  } else {
    $(".navigasi1").removeClass("nav_scroll_visible");
    $(".nav_search1").removeClass("srch_scroll_visible");
  }
});

//animation svg button :
// toggle condition for click events
let toggle = false;
let togglePoints = false;
//click action
$(".points_menu").hover(() => {
  let isi = "rgba(255,255,255,1)";
  let isiKosong = "rgba(255,255,255,0)";
  const timeline1 = anime.timeline({
    duration: 750,
    easing: "easeOutExpo",
  });

  $(".points_menu_navigation").toggleClass("points_menu_navigation_show");

  timeline1
    .add({
      targets: "#c_3",
      fill: [{ value: togglePoints ? isiKosong : isi }],
    })
    .add(
      {
        targets: "#c_2",
        fill: [{ value: togglePoints ? isiKosong : isi }],
      },
      "-=600"
    )
    .add(
      {
        targets: "#c_1",
        fill: [{ value: togglePoints ? isiKosong : isi }],
      },
      "-300"
    );
  if (!togglePoints) {
    togglePoints = true;
  } else {
    togglePoints = false;
  }
});

$(".humberger_button").click(() => {
  //toggle dikondisiin di bawah
  toggle
    ? $(".humberger_navigation").slideUp(400)
    : $(".humberger_navigation").slideDown(400);
  toggle
    ? $(".navigasi1").removeClass("navigasi_visible", 330, "easeOutExpo")
    : $(".navigasi1").addClass("navigasi_visible", 100);
  toggle
    ? $(".nav_search1").removeClass("nav_search_visible", 330, "easeOutExpo")
    : $(".nav_search1").addClass("nav_search_visible", 100, "easeInExpo");

  //ANIME.JS humberger button toggle close-menu;
  const timeline = anime.timeline({
    duration: 900,
    easing: "easeOutExpo",
  });
  timeline
    .add({
      targets: ".line_1",
      translateX: toggle ? "0" : "100",
      width: toggle ? "650" : "620",
      rotateZ: toggle ? "0" : "45",
    })
    .add(
      {
        targets: ".line_2",
        translateY: toggle ? "0" : "300",
        translateX: toggle ? "0" : "-120",
        width: toggle ? "530" : "620",
        rotateZ: toggle ? "0" : "-45",
      },
      "-=900"
    )
    .add(
      {
        targets: ".line_3",
        translateY: toggle ? "0" : "195",
        opacity: toggle ? "1" : "0",
      },
      "-=900"
    );





    
  //toggle condition
  if (!toggle) {
    toggle = true;
  } else {
    toggle = false;
  }
});

//dropdown navigation
//explore
$(".explore").hover(() => {
  $(".explore_navigation").toggleClass("explore_navigation_show");
});

//other menu
$(".another").hover(() => {
  $(".other_navigation").toggleClass("other_navigation_show");
});

//filter button (dibawah searching)
let tombol = $(".nav li input");
let position = $(".nav li").position();
let list = $(".filter_srch li");

//penambahan class di setiap list
list.each(function (index) {
  $(this).addClass("filter_list_" + (index + 1));
});

//nambahin class active, gunanya buat ngambil filternya nanti
$(".nav li input").on("click", function () {
  $(".nav li input").removeClass("actv");
  $(this).addClass("actv");

  //animasi backgroundnya pindah & search manage
  let input_search = $(".srch");
  if ($($(".actv")[0].parentElement).hasClass("filter_list_1")) {
    $(".animate_btn").animate(
      {
        left: "8.5px",
      },
      300
    );
    /* $('#second_search_link').attr('action','http://localhost/deux/search/photo/');
	input_search.on('keyup', function(){	
		$('#second_search_link').attr('action','http://localhost/deux/search/photo/'+input_search.val());
	}); */
  } else if ($($(".actv")[0].parentElement).hasClass("filter_list_2")) {
    $(".animate_btn").animate(
      {
        left: "75px",
      },
      300
    );
    /* $('#second_search_link').attr('action','http://localhost/deux/search/vector/');
	input_search.on('keyup', function(){	
		$('#second_search_link').attr('action','http://localhost/deux/search/vector/'+input_search.val());
	}); */
  } else if ($($(".actv")[0].parentElement).hasClass("filter_list_3")) {
    $(".animate_btn").animate(
      {
        left: "142px",
      },
      300
    );
    /* $('#second_search_link').attr('action','http://localhost/deux/search/icon/');
	input_search.on('keyup', function(){	
		$('#second_search_link').attr('action','http://localhost/deux/search/icon/'+input_search.val());
	}); */
  } else if ($($(".actv")[0].parentElement).hasClass("filter_list_4")) {
    $(".animate_btn").animate(
      {
        left: "207px",
      },
      300
    );
    /* $('#second_search_link').attr('action','http://localhost/deux/search/author/');
	input_search.on('keyup', function(){	
		$('#second_search_link').attr('action','http://localhost/deux/search/author/'+input_search.val());
	});*/
  }
});

//gak efisien, tapi bingung, intinya buat search engine di navigation bar
$(".nav_input_srch").focus(() => {
  $(".nav_srch_btn").removeClass("whitebtn");
  $(".nav_srch_btn").addClass("blackbtn");
  $(".nav_input_srch").removeClass("whitebtn");
  $(".nav_input_srch").addClass("blackbtn");
});
$(".nav_input_srch").blur(() => {
  $(".nav_srch_btn").removeClass("blackbtn");
  $(".nav_srch_btn").addClass("whitebtn");
  $(".nav_input_srch").removeClass("blackbtn");
  $(".nav_input_srch").addClass("whitebtn");
});

// animasi search button ketika form input focus
let targetElemen = $(".search_dms form .srch");
let searchButton = $(".srch_btn");
targetElemen.focus(function () {
  searchButton.removeClass("srch_btn_pro");
  searchButton.addClass("srch_btn_active");
});

targetElemen.blur(function () {
  searchButton.removeClass("srch_btn_active");
  searchButton.addClass("srch_btn_pro");
});

//Mosaic layout using colcade.js -fail
// $(window).on("load", function(){
// 	$('.my-grid').colcade({
// columns: '.grid-col',
// items: '.grid-item'
// })
// })

//tooltip and popover for homepage

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();

  // $('.title')
  // .popup({
  // 	on:'hover',
  // 	delay: {
  // 		show: 200,
  // 		hide:250,
  // 	},
  // 	hoverable:true,
  // 	inline: true,
  // 	title: 'fuck you bitch',
  // 	content: 'Fuck with your Life, I need you babe',
  // 	position: 'bottom left',
  // });

  $(".acnt").popup({
    popup: ".acnt_data",
    on: "hover",
    delay: {
      show: 200,
      hide: 250,
    },
    inline: true,
    exclusive: true,
    // boundary:   $('body'),
    hoverable: true,
    position: "top left",
    observeChanges: false,
  });
});
$("#user_nav").popup({
  popup: "#user_list",
  on: "hover",
  inline: true,
  exclusive: true,
  lastResort: true,
  // boundary: $("body"),
  hoverable: true,
  // position: "bottom left",
  // observeChanges: false,
});

// mosaic layout using masonry and imageloaded

// init -Masonry
var $grid = $(".my-grid").masonry({
  itemSelector: ".grid-item",
  percentPosition: true,
  horizontalOrder: true,
  // fitWidth:
  gutter: 0,
  columnWidth: ".grid-sizer",
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function () {
  $grid.masonry("layout");
  $grid.masonry("reloadItems");
});

// Tab menu & grid content
// $(document).ready(function() {
//
//     $(".content-title a").click(function() {

//         $(".container-self .my-grid").empty().append("<div class='ui active inline loader'></div>");
//         $(".content-title a").removeClass('active');
//         $(this).addClass('active');

// 		let page = this.hash.substr(1);
// 		$.get("content/"+page+".php",function(gotHtml){
// 			$(".container-self .my-grid").html(gotHtml);
// 			// // wrap content in jQuery object
// 			// var $content = $( content );
// 			// // add jQuery object
// 			// $grid.append( $content ).masonry( 'appended', $content );
// 		});
//         // $.ajax({ url: this.href, success: function(html) {
// 		// 	$(".container-self").empty().append(html);
//         //     }
// 		// });

//     	return false;
// 	});
// 	$.get("content/photos.php",function(gotHtml){
// 		$(".container-self .my-grid").html(gotHtml);
// 		// // wrap content in jQuery object
// 		// var $content = $( content );
// 		// // add jQuery object
// 		// $grid.append( $content ).masonry( 'appended', $content );
// 	});

// 	// $(".container-self").empty().append("<div class='ui active inline loader'></div>");
//     // $.ajax({ url: 'content/photos.php', success: function(html) {
//     //         $(".container-self").empty().append(html);
//     // }
//     // })
// });

// $(function(){
// 	$(".content-title a").click(function(){
// 		$(".content-title a").removeClass('active');
// 		$(this).addClass('active');
// 		let page = this.hash.substr(1);
// 		$.get("content/"+page+".php",function(gotHtml){
// 			$(".container-self").html(gotHtml);
// 		});

// 	})
// })

const inputs = document.querySelectorAll(".input");

function addcl() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcl() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});

let password = $(".input-div.pass .div .input");
$(password).on("focus", function () {
  $(".i-eye").removeClass("i-eye-display-none");
  $(".i-eye").addClass("i-eye-display-flex");
});
$(password).on("blur", function () {
  if (($(password).value = "")) {
    $(".i-eye").removeClass("i-eye-display-flex");
    $(".i-eye").addClass("i-eye-display-none");
  }
});

function eyeon() {
  $(".i-eye i").addClass("slash");
  $(password).attr("type", "text");
}
function eyeoff() {
  $(".i-eye i").removeClass("slash");
  $(password).attr("type", "password");
}
let eye = false;
$(".i-eye").click(() => {
  eye ? eyeoff() : eyeon();

  if (!eye) {
    eye = true;
  } else {
    eye = false;
  }
});

// inputs.each(input => {
// 	$(this).on("focus", addcl);
// 	$(this).on("blur", remcl);

// });
// let eyeButton = $(".i-eye");
// // let eye = $(".i-eye")[0].parentElement;
// if(!(eyeButton.closest('.input-div:has(.focus)'))){
// 	eyeButton.removeClass("i-start");
// }else{
// 	eyeButton.addClass("i-start");
// }

// IMAGE UPLOAD PREVIEWER

// 	let file = this.files[0];
// 	let fileType = file["type"];
// 	let validImageTypes = ["image/jpeg", "image/png","image/jpg"];
// if($('#type-upload').val('photo')){
// }

function filePreview(input, location) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $(location).empty();
      // $('.input-file-upload + img').remove();
      $(location).append('<img src="' + e.target.result + '"  >');
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imagefile").change(function () {
  // var upload_fs = $(this)[0].files[0].size/Math.pow(1024,2);

  var val = $(this).val();
  if ($("#type-upload").val() == "photo") {
    // $('#imagefile').attr('accept','image/jpeg, image/pjpeg, image/png');
    switch (val.substring(val.lastIndexOf(".") + 1).toLowerCase()) {
      case "jpeg":
      case "jpg":
      case "png":
        /* if (upload_fs => 4) {
					
				} */
        filePreview(this, ".input-file-upload");
        // $('#type-upload').attr('disabled','disabled');
        $(".input-text-data-upload").removeAttr("disabled");
        break;

      default:
        $(this).val("");
        $(".input-file-upload").empty();
        $(".input-file-upload").append("<span>Upload preview</span>");
        // error message here
        alert(
          "the extensions needed to upload photos are only jpg, jpeg, and png"
        );
        break;
    }
  } else if ($("#type-upload").val() == "vector") {
    // $('#imagefile').attr('accept','image/jpeg, image/pjpeg, image/png, image/svg+xml, application/svg+xml');
    switch (val.substring(val.lastIndexOf(".") + 1).toLowerCase()) {
      case "jpeg":
      case "jpg":
      case "png":
        filePreview(this, ".input-file-upload");
        // $('#type-upload').attr('disabled','disabled');
        $(".input-text-data-upload").removeAttr("disabled");
        break;
      default:
        $(this).val("");
        $(".input-file-upload").empty();
        $(".input-file-upload").append("<span>Upload preview</span>");
        // error message here
        alert(
          "the extensions needed to upload vectors are only jpg, jpeg, and png"
        );
        break;
    }
  } else if ($("#type-upload").val() == "icon") {
    // $('#imagefile').attr('accept','image/png, image/svg+xml, application/svg+xml');
    switch (val.substring(val.lastIndexOf(".") + 1).toLowerCase()) {
      case "png":
        filePreview(this, ".input-file-upload");
        // $('#type-upload').attr('disabled','disabled');
        $(".input-text-data-upload").removeAttr("disabled");
        break;
      default:
        $(this).val("");
        $(".input-file-upload").empty();
        $(".input-file-upload").append("<span>Upload preview</span>");
        // error message here
        alert("the extensions needed to upload Icons are only png");
        break;
    }
  }
});

// $('#imagefile').change(function(){
// 	filePreview(this,'.input-file-upload');
// });
$("#avatar-browse").change(function () {
  var file = $(this)[0].files[0].size / Math.pow(1024, 2);

  var val2 = $(this).val();
  switch (val2.substring(val2.lastIndexOf(".") + 1).toLowerCase()) {
    case "png":
    case "svg":
    case "jpg":
    case "jpeg":
    case "gif":
      if (file > 1.5) {
        $(this).val("");
        $(".avatar-setting").empty();
        $(".avatar-setting").append(
          "<img src='" +
            baseurl +
            "/assets/avatar/undraw_male_avatar_323b.svg'>"
        );
        alert(
          "Your image file size to big, the file size must smaller than 1,5 MB"
        );
      } else {
        filePreview(this, ".avatar-setting");
      }
      break;
    default:
      $(this).val("");
      $(".avatar-setting").empty();
      $(".avatar-setting").append(
        "<img src='" + baseurl + "/assets/avatar/undraw_male_avatar_323b.svg'>"
      );
      // error message here
      alert(
        "the extensions needed to upload avatar are only svg, gif, jpg, jpeg, and png"
      );
      break;
  }
});

$(".resetupload").click(() => {
  $("#imagefile").val("");
  $(".input-file-upload").empty();
  $(".input-file-upload").append("<span>Upload preview</span>");
  $("#type-upload").removeAttr("disabled");
  $(".input-text-data-upload").attr("disabled", "disabled");
});

$("#home_modal").on("show.bs.modal", function (event) {
  // console.log('huihu');
  let id = $(event.relatedTarget).data("id");
  $("#preview_link").on("click", function (event) {
    event.preventDefault();
  });
  $.ajax({
    // console.log()
    url: baseurl + "/home/getPreview/" + id,
    complete: (data) => {
      let hasil = data.responseJSON;
      $("#modal_image").attr(
        "src",
        baseurl +
          "/assets/upload/" +
          hasil.img_type +
          "/medium/" +
          hasil.img_file
      );
      $("#modal_title").html(hasil.img_title);
      $("#modal_title b").html(hasil.img_title);
      $("#modal_location").html(hasil.img_location);
      $("#modal_caption").html(
        "<b>" + hasil.jumlah_like + " Likes </b> - " + hasil.img_caption
      );
      $("#modal_download").attr(
        "href",
        baseurl + "/assets/upload/all/" + hasil.img_file
      );
      $("#modal_download").attr("download", hasil.img_file);
      $("#modal_link").attr(
        "href",
        baseurl + "/search/" + hasil.img_type + "/" + hasil.img_category
      );
      $("#modal_link").html(hasil.img_type + " - " + hasil.img_category);
      var show;
      if (hasil.user_avatar == "") {
        show = "undraw_male_avatar_323b.svg";
      } else {
        show = hasil.user_avatar;
      }
      $("#avatar").attr("src", baseurl + "/assets/avatar/" + show);
      $("#username").html(hasil.username);
      $("#username").attr("href", baseurl + "/member/user/" + hasil.id);
      $(".modal_love").attr("data-id", hasil.img_id);
      if (!hasil.like) {
        $(".modal_love").children().attr("fill", " ");

        $(".modal_love").children().attr("stroke", "#000");
      } else {
        $(".modal_love").children().attr("fill", "#ce1111");
        $(".modal_love").children().attr("stroke", "#ce1111");
      }
    },
  });
});

$("#second_search").keyup(function () {
  let query = $(this).val();
  if (query != "") {
    $.ajax({
      url: baseurl + "/home/getDataSearch",
      method: "POST",
      data: { query: query },
      success: function (data) {
        $("#searchList").fadeIn();
        $("#searchList").html(data);
      },
    });
  } else {
    $("#searchList").fadeOut();
  }
});
$(document).on("click", "#srch_li", function () {
  $("#second_search").val($(this).text());
  $("#searchList").fadeOut();
});

// $('.like_prs').on('click', function(){
// 	var img_id = $(this).data('id');

// 	$.ajax({
// 		url: baseurl + '/UsersAjax/like/'+img_id,
// 		type: 'post',
// 		success: function(result){
// 			// $post.parent().find('span.likes_count').text(response + " likes");
// 			// $post.addClass('hide');
// 			// $post.siblings().removeClass('hide');
// 			$('.love_button path').attr('fill','#CE1111');

// 		}
// 	});
// });

$(".love_button").each((index, element) => {
  $(element).click((event) => {
    let imgId = $(element).data("id");
    // console.log(imgId);
    if ($(element).hasClass("liking")) {
      $.ajax({
        url: baseurl + `/UsersAjax/unlike/${imgId}`,
        complete: (result) => {
          let hasil = result.responseJSON;
          // console.log(result);
          if (!hasil.error) {
            $(element).removeClass("liking");
            $(element).children().attr("fill", "");
            $(element).children().attr("stroke", "#dddddd");
            // $(element)[0].parentElement.attr("title", "Like This Picture");
          }
        },
      });
    } else {
      $.ajax({
        url: baseurl + `/UsersAjax/like/${imgId}`,
        complete: (result) => {
          let hasil = result.responseJSON;
          if (!hasil.error) {
            $(element).addClass("liking");
            $(element).children().attr("fill", "#CE1111");
            $(element).children().attr("stroke", "#CE1111");
            // $(element)[0].parentElement.attr("title", "Unlike This Picture");
          }
        },
      });
    }
  });
});
$("#delete").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("id"); // Extract info from data-* attributes
  var name = button.data("name");
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal
    .find(".modal-body")
    .html("Are you sure you want to delete this post called '" + name + "' ?");
  modal.find(".hapus").attr("href", baseurl + "/member/delete/" + id);
});
$(function () {
  $(".EditPost").on("click", function () {
    const id = $(this).data("edit");

    $.ajax({
      url: baseurl + "/member/getDataEdit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#file").attr(
          "src",
          baseurl +
            "/assets/upload/" +
            data.img_type +
            "/small/" +
            data.img_file
        );
        $("#id").val(data.img_id);
        $("#type").val(data.img_type);
        $("#title").val(data.img_title);
        $("#category").val(data.img_category);
        $("#location").val(data.img_location);
        $("#caption").html(data.img_caption);
      },
    });
  });
});
