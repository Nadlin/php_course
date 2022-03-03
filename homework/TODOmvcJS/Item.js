// model
function Item() {
  var myView = null;
  var item = {};
  var textInput = null;
  var idItem = null;
  var textNotes = null;
  var color = null;
  var updatePassword;
  var ajaxHandlerScript = "https://fe.it-academy.by/AjaxStringStorage2.php";
  var stringName = "LINNIK_TO_DO_2";
  this.items = {
    current: [],
    completed: []
    };
  var self = this;
  var termination = null;

  this.init = function(view) {
    myView = view;
  }

  this.cleanInput = function(input) {
    myView.clear();
  }

  this.addItem = function(input, textarea, buttoncolor, buttonpriority) {
    item = {};
    var timeNow = new Date();
    idItem = timeNow.getTime();

    textInput = input.val(); // получили значение из input
    textNotes = textarea.val();
    color = buttoncolor;
    priority = buttonpriority;

    termination = $("#datepicker").datepicker("getDate");
    if (termination) {
      dateTermination = termination.getDate()+"/"+(termination.getMonth()+1)+"/"+termination.getFullYear();
      terminationID = termination.getTime();
    } else {
      dateTermination = "-";
      terminationID = "2000000000000";
    }

    item.id = idItem;
    item.task = textInput;
    item.color = buttoncolor;
    item.notes = textNotes;
    item.priority = priority;
    item.termination = terminationID; //мсек
    item.dateTermination= dateTermination;
    item.chosen = false;

    this.items.current.push(item);
    console.log(this.items);
    this.requestDataUpdate();
    myView.createItem(item);
    this.cleanInput();
  }

  this.deleteItem = function(elemId) {
    var i;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {
        this.items.current.splice(i,1); //удаляем из массива один элемент, начиная с i-го
        break;
      };
    }
   
    this.requestDataUpdate();
   // console.log(this.items);
    myView.deleteElem(elemId);
    myView.cancelDelElemCurrent();

  }

  this.editItem = function(elemId) {
    var i;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {
        item = this.items.current[i];
        break;
      };
    }
    myView.editElem(item);
  }

  this.itemChange = function(elemId) {
    var i;
    var termination, terminationID, dateTermination;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {

        this.items.current[i].task = $("#task-edit").val();
        this.items.current[i].notes = $("#notes-edit").val();
        this.items.current[i].color = $("#edit-form li.shadow").attr("data-color");
        this.items.current[i].priority = $("#edit-form li.shadow").attr("data-priority");
        termination = $("#datepickerD").datepicker("getDate");;
        if (termination) {
          dateTermination = termination.getDate()+"/"+(termination.getMonth()+1)+"/"+termination.getFullYear();
          terminationID = termination.getTime();
        } else {
          dateTermination = "-";
          terminationID = "2000000000000";
        }
        this.items.current[i].termination = terminationID;
        this.items.current[i].dateTermination = dateTermination;
        item = this.items.current[i];
        break;
      };
    }
    console.log(item);
    this.requestDataUpdate();
    myView.rebuildItem(item);

  }
  this.editCancellation = function(elemId) {
    myView.editCancellation();
  }

  this.requestDataUpdate = function() {
    updatePassword=Math.random();
    //this.items = {current: [], completed: []};
     $.ajax( {
        url : ajaxHandlerScript, type : 'POST', cache : false, dataType:'json',
        data : { f : 'LOCKGET', n : stringName, p : updatePassword },
        success : function() {
          $.ajax( {
          url : ajaxHandlerScript, type : 'POST', cache : false, dataType:'json',
          data : { f : 'UPDATE', n : stringName, v : JSON.stringify(self.items), p : updatePassword },
          success : function() {self.countItems()},
          error : function() {alert("error")}
          }
          );
        },
        error : function() {}
      }
    );
  }

  this.requestDataRead = function() {
    $.ajax( {
      url : ajaxHandlerScript,
      type : 'POST',
      cache : false,
      dataType:'json',
      data : { f : 'READ', n : stringName },
      success : dataLoaded,
      error : function() {alert("error")}
    });
    function dataLoaded(data) {
      self.items = JSON.parse(data.result);
      console.log(self.items);
      self.changeWindowHash();   
      self.countItems();
    }
  }

  this.sortPriority = function(sort) {
    var sortArr = [];
    var noSortArr = [];

    this.items.current.forEach(function(item) {
      sortArr.push(item);
    });
    this.items.current.forEach(function(item) {
      noSortArr.push(item);
    });
    sortArr.sort(function (a, b) {
      if(a.priority > b.priority) {
          return 1;
      } else if(a.priority < b.priority) {
          return -1;
      } else {
          return 0;
      }
    });
    if (sort) {
      myView.sortpriority(sortArr);
    } else {
      myView.sortpriority(noSortArr);
    }
  }
  
  this.sortPriorityDate = function(sort) {
    var sortArr = [];
    var noSortArr = [];
   
    this.items.current.forEach(function(item) {
      sortArr.push(item);
    });
    this.items.current.forEach(function(item) {
      noSortArr.push(item);
    });
    sortArr.sort(function (a, b) {
      if(a.termination > b.termination) {
          return 1;
      } else if(a.termination < b.termination) {
          return -1;
      } else {
          return 0;
      }
    });
    if (sort) {
      myView.sortpriority(sortArr);
    } else {
      myView.sortpriority(noSortArr);
    }
  }

  this.addInChosen = function(elemId) {
    var i;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {
       // item = this.items.current[i];
        if ($("#"+elemId+ " .star").is(":checked")) {//если ранее был выбран, то при клике - отключаем чекбокс
          this.items.current[i].chosen = false;
          } else {
            this.items.current[i].chosen = true;
          };
        break;
      };
    }
    this.requestDataUpdate();
  }
  this.showChosenItems = function() {
    myView.showChosenItems();
  }
  this.showAllItems = function() {
    myView.showAllItems();
  }
  this.completedItem = function(elemId) {
    var i;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {
        item = this.items.current[i];
        break;
      };
    }
    myView.completedItem(item);
  }

  this.addItemToCompleted = function(elemId) {
    var i;
    for (i=0; i< this.items.current.length; i++) {
      if (this.items.current[i].id == elemId) {
        this.items.current.splice(i,1); //удаляем из массива один элемент, начиная с i-го
        break;
      };
    }
    this.requestDataUpdate();
    myView.deleteElem(elemId);

    var itemCompleted = {};
    itemCompleted.id = elemId;
    itemCompleted.task = $("#task-completed").text();
    itemCompleted.notes = $("#notes-completed").text();
    itemCompleted.dateTermination =  $("#date-termination").text();
    itemCompleted.dateCompleted = $("#date-completed").text();
    itemCompleted.notes_completed = $("#notes_completed").val();

    this.items.completed.push(itemCompleted);
    console.log(this.items);
    myView.cancelCompleteElem();
  };
  this.cancelCompleteItem = function () {
    myView.cancelCompleteElem();
  }
  this.changeWindowHash = function() {   
    var hash = window.location.hash;
    switch (hash) {
      case "":
      case "#current":
        $.ajax("main.html", { 
          type:'GET', 
          dataType:'html', 
          success: function(data) {
            $("#container").html(data);
            self.widgetCurrent();
            myView.buildHtml();
            myView.menuActive("current");
          }, 
          error: function() {
            alert("error");
          }
        }
        );
        break;
      case "#completed":
          self.widgetCompleted();
          myView.addElemToCompleted(this.items.completed);
          myView.menuActive("completed");
          break;
    }
  }

  this.deleteInCompleted = function(elemId) {
   var i;
    for (i=0; i< this.items.completed.length; i++) {
      if (this.items.completed[i].id == elemId) {
        this.items.completed.splice(i,1); //удаляем из массива один элемент, начиная с i-го
        break;
      };
    }
    this.requestDataUpdate();
    myView.deleteElemCompleted(elemId);
    myView.cancelDelElemCompleted();
  }
  this.cancelDelItemCompleted = function() {
    myView.cancelDelElemCompleted();
  }
  this.cancelDelItem = function() {
    myView.cancelDelElemCurrent();
  };
  this.DelItemCurrentWindow = function() {
    myView.delElemCurrentWindow();
  };

  this.changeArrSortable = function(newArr) {
    var newSort = newArr;
    for (var i=0; i<this.items.current.length; i++ ) {
      for (var j=0; j<newSort.length; j++) {
        if (this.items.current[i].id == newSort[j]) {
          newSort[j] = this.items.current[i];
        }
      };
    }
    this.items.current = newSort;
    this.requestDataUpdate();
  }
  this.countItems = function() {
    var currentN = self.items.current.length;
    var completedN = self.items.completed.length;
    myView.countElems(currentN, completedN);
  }

  this.widgetCurrent = function() {
    $('#edit-form').dialog({
      autoOpen:false, // окно создаётся скрытым
      buttons:[ {text:'Сохранить', id: 'but-save', click: itemController.itemChange}, {text:'Отмена', id: 'but-cancel', click: itemController.editCancellation} ]
    });
    $('#completed-form').dialog({
      autoOpen:false, // окно создаётся скрытым
      buttons:[ {text:'Сохранить', click: itemController.addToCompleted}, {text:'Отмена', click: itemController.cancelComplete} ]
    });
    $('#delete').dialog({
      autoOpen:false, // окно создаётся скрытым
      buttons:[ {text:'Удалить', click: itemController.delItem}, {text:'Отмена', click: itemController.cancelDelItem} ]
    });
    $("#datepicker, #datepickerD").datepicker({
      prevText: '&#x3c;Пред',
      nextText: 'След&#x3e;',
      currentText: 'Сегодня',
      monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
      monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
      dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
      dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
      dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
      weekHeader: 'Не',
      dateFormat: 'dd.mm.yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    });
    $('#block-items').sortable( { update: itemController.sortableCurrent, containment:'body', cursor:'move'} );
  }

  this.widgetCompleted = function() {
     $('#delete-c').dialog({
      autoOpen:false, // окно создаётся скрытым
      buttons:[ {text:'Удалить', click: itemController.deleteCompleted}, {text:'Отмена', click: itemController.cancelDelCompleted} ]
    });
  }

}
