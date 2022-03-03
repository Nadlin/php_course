function ItemController() {
  var self = this;
  var myModel = null;
  var myField = null;
  var buttonAdd = null;
  var inputItem = null;
  var buttonDel = null;
  var itemId = null;
  var notesTextArea= null;
  var buttonColor = null;
  var buttonPriority =null;
  var inputItemValue= null;

  this.init = function(model, container) {
    myModel = model;
    myField = container;

    $("body").on("click", ".importance li", function() {
      $(this).addClass("shadow").siblings().removeClass("shadow");
    });
    $("#mySearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#block-items .elem, #block-items .item_").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

      })
    });

    myField.on("click", ".exit", function() {
      itemId = $(this).parents(".elem").attr("id");
      self.DelItemCurrent();
    });
    $("#container").on("click", "#priority", function() {
      $(this).toggleClass("active");
      if ($(this).is(".active")) {
        self.sortButton();
        $(this).siblings(".sort").removeClass("active");
      } else {
        self.nosortButton();
      };
      if ($("#chosen").is(".active")) {
        self.showChosen();
      }
    });
    $("#container").on("click", "#pri-term", function() {
      $(this).toggleClass("active");
      if ($(this).is(".active")) {
        self.sortButtonDate();
        $(this).siblings(".sort").removeClass("active");
      } else {
        self.nosortButtonDate();
      };
      if ($("#chosen").is(".active")) {
        self.showChosen();
      }
    });
    myField.on("click", ".edit", function() {
      itemId = $(this).parents(".elem").attr("id");
      self.editItem();
    });
    
    myField.on("click", ".star + label", function() {
      itemId = $(this).parents(".elem").attr("id");
      self.addInChosen();
    });
   $("#container").on("click", "#chosen", function() {
      $(this).toggleClass("active");
      if ($(this).is(".active")) {
        self.showChosen();
      } else {
        self.showAllItems();
      }
    });
    myField.on("click", ".done", function() {
      itemId = $(this).parents(".elem").attr("id");
      self.completedItem();
    });
    $(window).on('hashchange',function(){ 
      self.changePage();
    });
    myField.on("click", ".exit-c", function() {
      itemId = $(this).parents(".item_").attr("id");
      //self.delItem();
      $('#delete-c').dialog('open');

    });
    $("#container").on("click", "#addItem", function() {
      inputItem = $("#text-item");
      notesTextArea = $("#notes");
      buttonColor = $(".importance li.shadow").attr("data-color");
      buttonPriority = $(".importance li.shadow").attr("data-priority");
      self.Add();
    });
    $(".menu").click(function() {
      $(this).addClass("active").siblings(".menu").removeClass("active");
    });
  }

  this.sortableCurrent = function() {
    var newArr = $('#block-items').sortable('toArray');
    myModel.changeArrSortable(newArr);
  }

  this.Add = function() {
    myModel.addItem(inputItem, notesTextArea, buttonColor, buttonPriority);
  }

  this.delItem = function() {
    myModel.deleteItem(itemId);

  }
  this.sortButton = function() {
    var sort = true;
    myModel.sortPriority(sort);
  }
   this.nosortButton = function() {
    myModel.sortPriority();
  }

  this.sortButtonDate = function() {
    var sort = true;
    myModel.sortPriorityDate(sort);
  }
  this.nosortButtonDate = function() {
    myModel.sortPriorityDate();
  }
  this.editItem = function() {
    myModel.editItem(itemId);
  }
  this.itemChange = function() {
    myModel.itemChange(itemId);
  }

  this.editCancellation = function() {
    myModel.editCancellation(itemId);
  }
  this.addInChosen = function() {
    myModel.addInChosen(itemId);
  };
  this.showChosen = function() {
    myModel.showChosenItems();
  }
  this.showAllItems = function() {
    myModel.showAllItems();
  }
  this.completedItem = function() {
    myModel.completedItem(itemId);
  }
  this.addToCompleted = function() {
    myModel.addItemToCompleted(itemId);
  };
  this.cancelComplete = function() {
    myModel.cancelCompleteItem();
  }
  this.changePage = function() {
    myModel.changeWindowHash();
  }
  this.deleteCompleted = function() {
    myModel.deleteInCompleted(itemId);
  }
  this.cancelDelCompleted = function() {
    myModel.cancelDelItemCompleted();
  }
  this.DelItemCurrent = function() {
    myModel.DelItemCurrentWindow();
  };
  this.cancelDelItem = function() {
    myModel.cancelDelItem();
  };

}