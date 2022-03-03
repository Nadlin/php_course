
 $("body").on("click", ".importance li", function() {
      $(this).addClass("shadow").siblings().removeClass("shadow");
  });

  $('body').on('click', '#pri-term', function (e) {
      $(this).addClass('active');
  })

  $('body').on('click', '#prior a', function (e) {
      $(this).addClass('shadow');
  })

  $("#datepicker, #datepickerD").datepicker({
      prevText: '&#x3c;Пред',
      nextText: 'След&#x3e;',
      currentText: 'Сегодня',
      weekHeader: 'Не',
      dateFormat: 'yy-mm-dd',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
  });

  $('#edit-form').dialog({
      autoOpen: false, // окно создаётся скрытым
      buttons:[ {text:'Save', id: 'but-save', click: itemChange}, {text:'Cancel', id: 'but-cancel', click: editCancellation} ]
  });

  $('#delete').dialog({
      autoOpen:false, // окно создаётся скрытым
      buttons:[ {text:'Delete', click: delItem}, {text:'Cancel', click: cancelDelItem} ]
  });

  function itemChange () {
      var elemId = $('#editedEl').val();
      var requestData = {
          action: 'update',
          id: elemId,
          task: $("#task-edit").val(),
          comment: $("#notes-edit").val(),
          priority: $("#edit-form .importance li.shadow").attr("data-color"),
          date: $("#datepickerD").val()
      }
      $('#edit-form').dialog('close');

      $.ajax({
          url: 'index.php', type: 'POST', cache: false,
          data: requestData,
          headers: {'Content-type': 'application/x-www-form-urlencoded'},
          success: function (data) {

              $('#' + elemId).detach();
              $('#block-items').prepend(data);

          },
          error: function (data) {

          }
      });
  };

  function editCancellation () {
      $('#edit-form').dialog('close');
  };

  $("#block-items").on("click", ".edit", function() {
      var itemId = $(this).parents(".elem").attr("id");
      var requestData = {
          action: 'edit',
          id: itemId
      }

      var requestJSON = JSON.stringify(requestData);

      $.ajax({
          url: 'index.php', type : 'POST', cache : false, dataType:'json',
          data: requestJSON,
          success: function(item) {
              console.log('success');
            //  var item = JSON.parse(data);
              $("#task-edit").val(item.task);
              $("#notes-edit").val(item.comment);
              $('#editedEl').val(item.id);
              $("#edit-form [data-color='"+ item.priority +"']").addClass("shadow").siblings().removeClass("shadow");
              if ( item.date != "-" )  {
                  $("#datepickerD").datepicker("setDate", new Date(item.date));
              } else {
                  $("#datepickerD").val("");
              }
              $('#edit-form').dialog('open');

          },
          error : function(data) {
              console.log('error');
          }
      });
  });

  $("#block-items").on("click", ".exit", function() {
      var itemId = $(this).parents(".elem").attr("id");
      $('#deletedElId').val(itemId);
      $('#delete').dialog('open');

  });

  function cancelDelItem () {
      $('#deletedElId').val('');
      $('#delete').dialog('close');
  }

  function delItem () {
      var itemId = $('#deletedElId').val();
      var requestData = {
          action: 'delete',
          id: itemId
      }
      var requestJSON = JSON.stringify(requestData);
      $('#delete').dialog('close');
      $.ajax({
          url: 'index.php', type : 'POST', cache : false, dataType:'json',
          data: requestJSON,
          success: function(item) {
              console.log('success');
              $('#' + itemId).detach();
              $('#current-n').text(Number($('#current-n').text()) - 1);
              //$('#delete').dialog('close');
              window.scrollTo(0,0);
              $('#message').addClass('-success').text('Задача была удалена').show();
              setTimeout(function() {
                  $('#message').hide();
              }, 1000);
          },
          error : function(data) {
              console.log('error');
          }
      });
  };

  function editItem (item) {
      $('#edit-form').dialog('open');
      $("#task-edit").val(item.task);
      $("#notes-edit").val(item.notes);
      $("[data-color='"+ item.color +"']").addClass("shadow").siblings().removeClass("shadow");
      if ( item.dateTermination != "-" )  {
          $("#datepickerD").datepicker("setDate", new Date(item.termination));
      } else {
          $("#datepickerD").val("");
      }
  }

 $("#form").on("submit", function(e) {
     e.preventDefault();
     var inputItem = $("#text-item"),
         notesTextArea = $("#notes"),
         buttonColor = $(".importance li.shadow").attr("data-color"),
         buttonPriority = $(".importance li.shadow").attr("data-priority");

     addItem(inputItem, notesTextArea, buttonColor, buttonPriority);
 });


  function addItem()
  {
      var xhr = new XMLHttpRequest();

      //var termination = $("#datepicker").datepicker("getDate");
      var dateTermination = $('#datepicker').val();
        //  terminationID;

      /*if (termination) {
          dateTermination = termination.getDate()+"/"+(termination.getMonth()+1)+"/"+termination.getFullYear();
          terminationID = termination.getTime();
      } else {
          dateTermination = "-";
          terminationID = "2000000000000";
      };*/


      var requestData = {
          action: 'create',
          task: $("#text-item").val(),
          comment: $("#notes").val(),
          priority: $(".importance li.shadow").attr("data-color"),
          date: dateTermination
      }

      $.ajax( {
          url: 'index.php', type : 'POST', cache : false,
          data: requestData,
          headers: {'Content-type': 'application/x-www-form-urlencoded'},
          success: function(data) {
              $('#block-items').prepend(data);
              $('#current-n').text(Number($('#current-n').text()) + 1);
              cleanForm();
          },
          error : function(data) {
          }
      });
  }

  function cleanForm () {
      $("#text-item, #notes, #datepicker").val("");
      $('[data-color="green"]').addClass("shadow").siblings().removeClass("shadow");
  }

 $('#invite').on('click', function () {
     $('.grow, #invite').hide();
     $('.register').css('display', 'flex');
 })
