<script>
function Remaining_Qunantity(qun)
{
    var status = "";
    var x = document.getElementById("status").value = qun;
  if(x > 0)
  {
    status = 'Pending';
    Z = document.getElementById("status").value = status ;
  }
  else
  {
      status = 'Finished';
    Z = document.getElementById("status").value = status ;
  }
}

function Get_Cat(type)
{   
    window.location.assign("<?php echo $link."?cat="?>"+type);
}

function showSelected()
    {
        debugger;
        var B_branch = $("#dropdown1").val();
        var TL_name = $("#dropdown2").val();
      
            debugger;
            var PC_name = "BOK-"+B_branch+ "-" + TL_name ;
            var Device_IP = "10.101."+B_branch+".";
            var Printer_IP = "10.101."+B_branch+".";
            var Phone_IP = "10.101."+B_branch+".";
            //alert(PC_name);
            $("#pc_name").val(PC_name);

            if(B_branch == 'Other')
            {
              var PC_name = "BOK-"+B_branch+ "-" + B_branch ;
              $("#pc_name").val(PC_name);
            }

            $("#device_ip").val(Device_IP);
            $("#printer_ip").val(Printer_IP);
            $("#phone_ip").val(Phone_IP);
    }
function Get_Device_Qun(cat_id,d_id)
  {   
    window.location.assign("<?php echo $link."?cat="?>"+cat_id+"&d_id="+d_id);
  }
function Device_Details(cat_id,d_id)
  {
    window.location.assign("<?php echo $link."?cat="?>"+cat_id+"&d_id="+d_id+"&type_id=");
  }

  function Maintain(cat_id,d_id,type_id)
  {   
    window.location.assign("<?php echo $link."?cat="?>"+cat_id+"&d_id="+d_id+"&type_id="+type_id);
  }
  function Maintain_List(cat_id,type_id)
  {   
    window.location.assign("<?php echo $link."?cat="?>"+cat_id+"&type_id="+type_id);
  }


  ////////////////////////////////////Name OF File///
  var fileInputTextDiv = document.getElementById('file_input_text_div');
var fileInput = document.getElementById('file_input_file');
var fileInputText = document.getElementById('file_input_text');

fileInput.addEventListener('change', changeInputText);
fileInput.addEventListener('change', changeState);

function changeInputText() {
  var str = fileInput.value;
  var i;
  if (str.lastIndexOf('\\')) {
    i = str.lastIndexOf('\\') + 1;
  } else if (str.lastIndexOf('/')) {
    i = str.lastIndexOf('/') + 1;
  }
  fileInputText.value = str.slice(i, str.length);
}

function changeState() {
  if (fileInputText.value.length != 0) {
    if (!fileInputTextDiv.classList.contains("is-focused")) {
      fileInputTextDiv.classList.add('is-focused');
    }
  } else {
    if (fileInputTextDiv.classList.contains("is-focused")) {
      fileInputTextDiv.classList.remove('is-focused');
    }
  }
}
    </script>

<footer class="footer">
                    <div class="container-fluid">
                   
              
                      <div class="copyright float-right">
                      All rights reserved for <b style="color:red;"> Maverick </b>  <script>
                          document.write(new Date().getFullYear())
                        </script>
                      </div>
                    </div>
                  </footer>
                </div>
              </div>


              <div class="fixed-plugin">
                <div class="dropdown show-dropdown">
                  <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                  </a>

                  <ul class="dropdown-menu">
                    <li class="header-title"> Sidebar Filters</li>
                    <li class="adjustments-line">
                      <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors ml-auto mr-auto">
                          <span class="badge filter badge-purple" data-color="purple"></span>
                          <span class="badge filter badge-azure" data-color="azure"></span>
                          <span class="badge filter badge-green" data-color="green"></span>
                          <span class="badge filter badge-warning" data-color="orange"></span>
                          <span class="badge filter badge-danger" data-color="danger"></span>
                          <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                      </a>
                    </li>
                    <li class="header-title">Sidebar Background</li>
                    <li class="adjustments-line">
                      <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="ml-auto mr-auto">
                          <span class="badge filter badge-black active" data-background-color="black"></span>
                          <span class="badge filter badge-white" data-background-color="white"></span>
                          <span class="badge filter badge-red" data-background-color="red"></span>
                          <span class="badge filter badge-yellow" data-background-color="yellow"></span>
                        </div>
                        <div class="clearfix"></div>
                      </a>
                    </li>
                    <li class="adjustments-line">
                      <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <label class="ml-auto">
                          <div class="togglebutton switch-sidebar-mini">
                            <label>
                              <input type="checkbox">
                              <span class="toggle"></span>
                            </label>
                          </div>
                        </label>
                        <div class="clearfix"></div>
                      </a>
                    </li>
                    <li class="adjustments-line">
                      <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Images</p>
                        <label class="switch-mini ml-auto">
                          <div class="togglebutton switch-sidebar-image">
                            <label>
                              <input type="checkbox" checked="">
                              <span class="toggle"></span>
                            </label>
                          </div>
                        </label>
                        <div class="clearfix"></div>
                      </a>
                    </li>
                    <li class="header-title">Images</li>
                    <li class="active">
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/img_01.png" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-2.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-3.jpg" alt="">
                      </a>
                    </li>
                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/sidebar-4.jpg" alt="">
                      </a>
                    </li>
                   

                    <li>
                      <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="../assets/img/img_01.png" alt="">
                      </a>
                    </li>
                    <li class="button-container">
                      <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block btn-fill">Buy Now</a>
                      <a href="https://demos.creative-tim.com/material-dashboard-pro/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                        Documentation
                      </a>
                      <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">
                        Get Free Demo!
                      </a>
                    </li>
                    <li class="button-container github-star">
                      <a class="github-button" href="https://github.com/creativetimofficial/ct-material-dashboard-pro" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                    </li>
                    <li class="header-title">Thank you for 95 shares!</li>
                    <li class="button-container text-center">
                      <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                      <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                      <br>
                      <br>
                    </li>
                  </ul>
                </div>
              </div>
              <!--   Core JS Files   -->
              <script src="../assets/js/core/jquery.min.js"></script>
              <script src="../assets/js/core/popper.min.js"></script>
              <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
              <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
              <!-- Plugin for the momentJs  -->
              <script src="../assets/js/plugins/moment.min.js"></script>
              <!--  Plugin for Sweet Alert -->
              <script src="../assets/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="../assets/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
              <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="../assets/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="../assets/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="../assets/js/plugins/arrive.min.js"></script>
              <!--  Google Maps Plugin    -->
              <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script> -->
              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="../../../buttons.github.io/buttons.js"></script>
              <!-- Chartist JS -->
              <script src="../assets/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="../assets/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="../assets/js/material-dashboard.minf066.js?v=2.1.0" type="text/javascript"></script>
              <!-- Material Dashboard DEMO methods, don't include it in your project! -->
              <script src="../assets/demo/demo.js"></script>
              <script>
                $(document).ready(function() {
                  $().ready(function() {
                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                      if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                      }

                    }

                    $('.fixed-plugin a').click(function(event) {
                      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                      if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                          event.stopPropagation();
                        } else if (window.event) {
                          window.event.cancelBubble = true;
                        }
                      }
                    });

                    $('.fixed-plugin .active-color span').click(function() {
                      $full_page_background = $('.full-page-background');

                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');

                      var new_color = $(this).data('color');

                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                      }

                      if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                      }

                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                      }
                    });

                    $('.fixed-plugin .background-color .badge').click(function() {
                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');

                      var new_color = $(this).data('background-color');

                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                      }
                    });

                    $('.fixed-plugin .img-holder').click(function() {
                      $full_page_background = $('.full-page-background');

                      $(this).parent('li').siblings().removeClass('active');
                      $(this).parent('li').addClass('active');


                      var new_image = $(this).find("img").attr('src');

                      if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                          $sidebar_img_container.fadeIn('fast');
                        });
                      }

                      if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                          $full_page_background.fadeIn('fast');
                        });
                      }

                      if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                      }

                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                      }
                    });

                    $('.switch-sidebar-image input').change(function() {
                      $full_page_background = $('.full-page-background');

                      $input = $(this);

                      if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar_img_container.fadeIn('fast');
                          $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                          $full_page_background.fadeIn('fast');
                          $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                      } else {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar.removeAttr('data-image');
                          $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                          $full_page.removeAttr('data-image', '#');
                          $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                      }
                    });

                    $('.switch-sidebar-mini input').change(function() {
                      $body = $('body');

                      $input = $(this);

                      if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                      } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                          $('body').addClass('sidebar-mini');

                          md.misc.sidebar_mini_active = true;
                        }, 300);
                      }

                      // we simulate the window Resize so the charts will get updated in realtime.
                      var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                      }, 180);

                      // we stop the simulation of Window Resize after the animations are completed
                      setTimeout(function() {
                        clearInterval(simulateWindowResize);
                      }, 1000);

                    });
                  });
                });
              </script>
              <!-- Sharrre libray -->
              <script src="../assets/demo/jquery.sharrre.js"></script>
              <script>
                $(document).ready(function() {


                  $('#facebook').sharrre({
                    share: {
                      facebook: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('facebook');
                    },
                    template: '<i class="fab fa-facebook-f"></i> Facebook',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  $('#google').sharrre({
                    share: {
                      googlePlus: true
                    },
                    enableCounter: false,
                    enableHover: false,
                    enableTracking: true,
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('googlePlus');
                    },
                    template: '<i class="fab fa-google-plus"></i> Google',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  $('#twitter').sharrre({
                    share: {
                      twitter: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    buttons: {
                      twitter: {
                        via: 'CreativeTim'
                      }
                    },
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('twitter');
                    },
                    template: '<i class="fab fa-twitter"></i> Twitter',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  // Facebook Pixel Code Don't Delete
                  ! function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                      n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                  }(window,
                    document, 'script', '../../../connect.facebook.net/en_US/fbevents.html');

                  try {
                    fbq('init', '111649226022273');
                    fbq('track', "PageView");

                  } catch (err) {
                    console.log('Facebook Track Error:', err);
                  }

                });
              </script>
              <noscript>
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
              </noscript>
              <script>
                $(document).ready(function() {
                  // Javascript method's body can be found in assets/js/demos.js
                  md.initDashboardPageCharts();

                  md.initVectorMap();

                });
              </script>

<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
</body>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2019 14:59:27 GMT -->
</html>
