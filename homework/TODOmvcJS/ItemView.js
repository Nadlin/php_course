function ItemView() {
  var myModel = null;
  var myField = null;
  var elem = null;
  var self = this;
  this.init = function(model, container) {
    myModel = model;
    myField = container;
  };

  this.clear = function(input) {
    $("#text-item, #notes, #datepicker").val("");
    $('[data-color="green"]').addClass("shadow").siblings().removeClass("shadow");
  };

  this.createItem = function(item) {
     var ItemHtml = '<div id="' + item.id + '" class="elem" data-priority="' + item.priority + '" data-termination="' + item.termination + '"><span class="task-i">' + item.task + '</span><div class="notes">'+ item.notes +'</div><div class="termination">'+ item.dateTermination + '</div><div class="exit" title="Удалить задачу"></div><div class="edit" title="Редактировать задачу"></div>' + 
     '<input class="star" id="st-'+item.id+'" type="checkbox">' +
     '<label for="st-'+item.id+'"></label>' +
     '<div class="done" title="Отметить как выполнена"></div><div class="important '+ item.color+'"></div></div>';
    elem = $(ItemHtml);
   
    myField.append(elem);
     $("#"+item.id+" .star").prop('checked', item.chosen);
  
  };

  this.deleteElem = function(id) {
    $("#"+ id +"").remove();
  }

  this.buildHtml = function() {
    $("#block-items").empty();
    myModel.items.current.forEach(function(item) {
      self.createItem(item);
    })
  }
  
  this.sortpriority = function(itemsArr) {
    myField.empty();
    for (var i=0; i<itemsArr.length; i++) {
      //console.log(key);
      var item = itemsArr[i];
      //console.log(hash);
      this.createItem(item);
    }
  }

  this.editElem = function(item) {
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
  this.rebuildItem = function(item) {
    $("#"+item.id +" span").text(item.task);
    $("#"+ item.id).find(".notes").text(item.notes);
     $("#"+ item.id).attr("data-priority", item.priority);
     $("#"+ item.id).attr("data-termination", item.termination);
     $("#"+ item.id).find(".termination").text(item.dateTermination);
     $("#"+ item.id).find(".important").attr("class", "important "+item.color+"");
    $('#edit-form').dialog('close');
  }
  this.editCancellation = function(elemId) {
    $('#edit-form').dialog('close');
  }

  this.showChosenItems = function() {
    $(".star:not(:checked)").parent(".elem").hide();
  }

  this.showAllItems = function() {
    $(".star:not(:checked)").parent(".elem").show();
  }
  this.completedItem = function(item) {
    var dateNow = new Date();
    var datetext = dateNow.getDate()+"/"+(dateNow.getMonth()+1)+"/" + dateNow.getFullYear();
    $('#completed-form').dialog('open');
    $("#task-completed").text(item.task);
    $("#notes-completed").text(item.notes);
    $("#date-termination").text(item.dateTermination);
    $("#date-completed").text(datetext);
    $("#notes_completed").val("");
  }

  this.addElemToCompleted = function(arr) {
    $("#block-items").empty();
    $("#container").empty();
    var elems;
    for (var i=0; i<arr.length; i++) {
       var ItemHtml = '<div id="'+arr[i].id+'" class="item_"><p class="task">'+arr[i].task+'</p><p class="notes">'+arr[i].notes+'</p><p>'+arr[i].notes_completed+'</p><p class="termination"><span>Срок выполнения: </span>'+arr[i].dateTermination+'</p><p class="competed-date"><span>Дата закрытия: </span>'+arr[i].dateCompleted+'</p><div class="exit-c"></div></div>';
      elem = $(ItemHtml);
      $("#block-items").append(elem);
    }
  };
  this.cancelCompleteElem = function () {
     $('#completed-form').dialog('close');
  }
  this.deleteElemCompleted = function(elemId) {
    $("#"+elemId).remove();
  }
  this.cancelDelElemCompleted = function() {
     $("#delete-c").dialog("close");
  }
  this.cancelDelElemCurrent = function() {
    $("#delete").dialog("close");
  };
  this.delElemCurrentWindow = function() {
    $("#delete").dialog("open");
  };
  this.countElems = function(currentCount, completedCount) {
    $("#current-n").text(currentCount);
    $("#completed-n").text(completedCount);
  }
  this.menuActive = function(adress) {
    $("[href='#"+adress+"']").addClass("active").siblings().removeClass("active");
  }

}