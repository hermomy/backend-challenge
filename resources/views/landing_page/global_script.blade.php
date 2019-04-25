<script>
    // $('.button').click(function (event) {
    //   event.preventDefault();
    //   $('.main-page1').load($(this).attr('href'));
  	 // });

     function hapus(url) {
       swal({
       title: "Are you sure to delete this data?",
       type: "warning",
       html:true,
       showCancelButton: true,
       confirmButtonColor: '#3ebf8f',
       confirmButtonText: 'Yes',
       cancelButtonText: 'No',
       closeOnConfirm: true
       },
       function(){
             $.ajax({
             type: "get",
             url: url,
             success: function (userRows) {
                 swal({
                       title: "Data successfully removed",
                       type: "success",
                       html:true,
                       showCancelButton: false,
                       confirmButtonColor: '#3ebf8f',
                       confirmButtonText: 'OK',
                       closeOnConfirm: true
                       },
                       function(){
                         location.reload();
                       });
             }
         });
       });
     };

     function paparan_data(url,data)
     {
        var form = document.getElementById('form_carian');
        if(form == null)
        {
          if(! $('input[name="jumlah_paparan"]').length)
          {
            $("<input type='hidden' value="+data.value+" />")
              .attr("id", "jumlah_paparan")
              .attr("name", "jumlah_paparan")
              .appendTo("#form_jumlah_paparan");
          }
          $("#form_jumlah_paparan").attr("action",url)
          document.getElementById("form_jumlah_paparan").submit()
        }
        else
        {
          if(! $('input[name="jumlah_paparan"]').length)
          {
            $("<input type='hidden' value="+data.value+" />")
              .attr("id", "jumlah_paparan")
              .attr("name", "jumlah_paparan")
              .appendTo("#form_carian");
          }
          document.getElementById("form_carian").submit()
        }
     }

    $(document).ready(function() {
        $(".btnDelete").bind("click", DeleteRowClone);
        
      var msg_before = 'Are you sure all details have been insert?';
      $('.btn_salin').click(function () {
          msg_before = "Anda pasti untuk salin rekod ini?";
      });

      $('.btn_proses').click(function () {
          msg_before = "Anda pasti untuk proses maklumat ini?";
      });

      $('#form_reload').submit(function(event)
      {
          event.preventDefault();
          swal({
          title: msg_before,
          type: "warning",
          html:true,
          showCancelButton: true,
          confirmButtonColor: '#3ebf8f',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No',
          closeOnConfirm: true
          },
          function(){
              $.ajax({
                  url: $('#form_reload').attr("action"),
                  type: "post",
                  data:new FormData($("#form_reload")[0]),
                  datatype: "json",
                  async:true,
                  processData: false,
                  contentType: false,
                  beforeSend: function()
                  {
                      $(".label-danger").html('');
                  }
                  })
                  .done(function(data)
                  {
                      if (data.validation_failed == 1)
                      {
                          var arr = data.errors;
                          $.each(arr, function(index, value)
                          {
                              if (value.length != 0)
                              {
                                  $("#"+index).html(value);
                              }
                          });
                      }
                      else
                      {
                          // close modal
                          swal({
                          title: "Data has been saved",
                          type: "success",
                          html:true,
                          showCancelButton: false,
                          confirmButtonColor: '#3ebf8f',
                          confirmButtonText: 'OK',
                          closeOnConfirm: true
                          },
                          function(){
                            location.reload();
                          });
                      }
                  })
                  .fail(function(jqXHR, ajaxOptions, thrownError)
                  {
                        alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
                  });
                  return false;
          });
      });

      $('#form_kemaskini').submit(function(event)
      {
          event.preventDefault();
          swal({
          title: msg_before,
          type: "warning",
          html:true,
          showCancelButton: true,
          confirmButtonColor: '#3ebf8f',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          closeOnConfirm: true
          },
          function(){
              $.ajax({
                  url: $('#form_kemaskini').attr("action"),
                  type: "post",
                  data:new FormData($("#form_kemaskini")[0]),
                  datatype: "json",
                  async:true,
                  processData: false,
                  contentType: false,
                  beforeSend: function()
                  {
                      $(".has-error").removeClass('has-error');
                  }
                  })
                  .done(function(data)
                  {
                      if (data.validation_failed == 1)
                      {
                          var arr = data.errors;
                          $.each(arr, function(index, value)
                          {
                              if (value.length != 0)
                              {
                                  $("#"+index).addClass('has-error');
                              }
                          });
                      }
                      else if(data.validation_failed == 'tick_ckbx')
                      {
                        swal({
                            title: "Sila Tanda di Ruangan Yang Disediakan",
                            type: "warning",
                            html:true,
                            showCancelButton: false,
                            confirmButtonColor: '#3ebf8f',
                            confirmButtonText: 'OK',
                            closeOnConfirm: true
                            })
                      }
                      else
                      {
                          // close modal
                          swal({
                          title: "Data berjaya dikemaskini",
                          type: "success",
                          html:true,
                          showCancelButton: false,
                          confirmButtonColor: '#3ebf8f',
                          confirmButtonText: 'OK',
                          closeOnConfirm: true
                          },
                          function(){
                            location.reload();
                          });
                      }
                  })
                  .fail(function(jqXHR, ajaxOptions, thrownError)
                  {
                        alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
                  });
                  return false;
          });
      });

      $('#form_refresh_parent').submit(function(event)
      {
          event.preventDefault();
          swal({
          title: msg_before,
          type: "warning",
          html:true,
          showCancelButton: true,
          confirmButtonColor: '#3ebf8f',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          closeOnConfirm: true
          },
          function(){
              // swal("Pengesahan!", "Sila Tunggu", "success");
              $.ajax({
                  url: $('#form_refresh_parent').attr("action"),
                  type: "post",
                  data:new FormData($("#form_refresh_parent")[0]),
                  datatype: "json",
                  async:true,
                  processData: false,
                  contentType: false,
                  beforeSend: function()
                  {
                      $(".has-error").removeClass('has-error');
                  }
                  })
                  .done(function(data)
                  {
                      if (data.validation_failed == 1)
                      {
                          var arr = data.errors;
                          $.each(arr, function(index, value)
                          {
                              if (value.length != 0)
                              {
                                  $("#"+index).addClass('has-error');
                              }
                          });
                      }
                      else if(data.validation_failed == 'error_salinan_uncheck')
                      {
                        swal({
                        title: data.errors,
                        type: "error",
                        html:true,
                        showCancelButton: false,
                        confirmButtonColor: '#3ebf8f',
                        confirmButtonText: 'OK',
                        closeOnConfirm: true
                        },
                        function(){

                        });
                      }
                      else
                      {
                          // close modal
                          swal({
                          title: "Data berjaya disimpan",
                          type: "success",
                          html:true,
                          showCancelButton: false,
                          confirmButtonColor: '#3ebf8f',
                          confirmButtonText: 'OK',
                          closeOnConfirm: true
                          },
                          function(){
                                window.opener.location.reload(true);
                                window.close();
                          });
                      }
                  })
                  .fail(function(jqXHR, ajaxOptions, thrownError)
                  {
                        alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
                  });
                  return false;
          });
      });

      $('#form_reload_no_alert').submit(function(event)
      {
          $.ajax({
              url: $('#form_reload_no_alert').attr("action"),
              type: "post",
              data:new FormData($("#form_reload_no_alert")[0]),
              datatype: "json",
              async:true,
              processData: false,
              contentType: false,
              beforeSend: function()
              {
                  $(".has-error").removeClass('has-error');
              }
              })
              .done(function(data)
              {
                  if (data.validation_failed == 1)
                  {
                      var arr = data.errors;
                      $.each(arr, function(index, value)
                      {
                          if (value.length != 0)
                          {
                              $("#"+index).addClass('has-error');
                          }
                      });
                  }
                  else
                  {
                      // close modal
                      location.reload();
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError)
              {
                    alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
              });
              return false;
      });

      $('#form_redirect').submit(function(event)
      {
          event.preventDefault();
          $.ajax({
              url: $('#form_redirect').attr("action"),
              type: "post",
              data:new FormData($("#form_redirect")[0]),
              datatype: "json",
              async:true,
              processData: false,
              contentType: false,
              beforeSend: function()
              {
                  $(".label-danger").html('');
              }
              })
              .done(function(data)
              {
                  if (data.validation_failed == 1)
                      {
                          var arr = data.errors;
                          $.each(arr, function(index, value)
                          {
                              if (value.length != 0)
                              {
                                  $("#"+index).html(value);
                              }
                          });
                      }
                  else
                  {
                      // close modal
                      swal({
                      title: "Application has been submitted",
                      type: "success",
                      html:true,
                      showCancelButton: false,
                      confirmButtonColor: '#3ebf8f',
                      confirmButtonText: 'OK',
                      closeOnConfirm: true
                      },
                      function(){
                        location.href = data.next_route;
                      });
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError)
              {
                    alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
              });
        });

      $('#form_redirect_no_alert').submit(function(event)
      {
          $.ajax({
              url: $('#form_redirect_no_alert').attr("action"),
              type: "post",
              data:new FormData($("#form_redirect_no_alert")[0]),
              datatype: "json",
              async:true,
              processData: false,
              contentType: false,
              beforeSend: function()
              {
                  $(".has-error").removeClass('has-error');
              }
              })
              .done(function(data)
              {
                  if (data.validation_failed == 1)
                  {
                      var arr = data.errors;
                      $.each(arr, function(index, value)
                      {
                          if (value.length != 0)
                          {
                              $("#"+index).addClass('has-error');
                          }
                      });
                  }
                  else
                  {
                      // close modal
                      location.href = data.next_route;
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError)
              {
                    alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
              });
              return false;
      });

      $('#form_not_reload').submit(function(event)
      {
          event.preventDefault();
          swal({
          title: msg_before,
          type: "warning",
          html:true,
          showCancelButton: true,
          confirmButtonColor: '#3ebf8f',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          closeOnConfirm: true
          },
          function(){
          $.ajax({
              url: $('#form_not_reload').attr("action"),
              type: "post",
              data:new FormData($("#form_not_reload")[0]),
              datatype: "json",
              async:true,
              processData: false,
              contentType: false,
              beforeSend: function()
              {
                  $(".has-error").removeClass('has-error');
              }
              })
              .done(function(data)
              {
                  if (data.validation_failed == 1)
                  {
                      var arr = data.errors;
                      $.each(arr, function(index, value)
                      {
                          if (value.length != 0)
                          {
                              $("#"+index).addClass('has-error');
                          }
                      });
                  }
                  else if(data.validation_failed == 'error_salinan_uncheck')
                  {
                    swal({
                    title: data.errors,
                    type: "error",
                    html:true,
                    showCancelButton: false,
                    confirmButtonColor: '#3ebf8f',
                    confirmButtonText: 'OK',
                    closeOnConfirm: true
                    },
                    function(){

                    });
                  }
                  else
                  {
                      // close modal
                      swal({
                      title: "Data berjaya disimpan",
                      type: "success",
                      html:true,
                      showCancelButton: false,
                      confirmButtonColor: '#3ebf8f',
                      confirmButtonText: 'OK',
                      closeOnConfirm: true
                      },
                      function(){

                      });
                  }
              })
              .fail(function(jqXHR, ajaxOptions, thrownError)
              {
                    alert('Terdapat ralat pada sistem ini. Sila hubungi Unit IT.');
              });
              return false;
            });
        });

      $('#selectall').click(function () {
            var table = $('#sample_1').DataTable();



//          var allPages = table.cells( ).nodes( );
//
//            $(':checkbox', allPages).prop('checked', this.checked);
//            $(':checkbox', table.rows().nodes()).prop('checked', this.checked);
          $(':checkbox').prop('checked', this.checked);

      });

      $( ":text" ).addClass("text-uppercase input-sm");

      //FUNCTION UNTUK HOLD LATEST TAB
      $(function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });

        var lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }
    });

    });

    function addrow_clone()
    {
        $(".rn").val(Number($(".rn").val())+1);

        $("#table_clone tbody").append($("#rowclone").html()).find('tr:last select').select2();
        $("#table_clone tbody").find('tr:last .control-danger').uniform({
            radioClass: 'choice',
            wrapperClass: 'border-danger-600 text-danger-800'
        });
        $("#table_clone tbody").find('tr:last .control-success').uniform({
            radioClass: 'choice',
            wrapperClass: 'border-success-600 text-success-800'
        });
        $("#table_clone tbody").find('tr:last :text').addClass("text-uppercase input-sm");
        $("#table_clone tbody").find('tr:last :radio').attr('name','radioclone['+$(".rn").val()+']');
        $(".btnDelete").bind("click", DeleteRowClone);
    }

    function DeleteRowClone() {
        var par = $(this).parent().parent(); //tr
        par.remove();
    }
</script>