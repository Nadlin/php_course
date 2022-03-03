  var item = new Item();
  var itemView = new ItemView();
  var itemController = new ItemController();

  var container = $("#block-items");
  var inputItem = $("#text-item");

  item.init(itemView); 
  itemView.init(item, container);
  itemController.init(item, container);

  item.requestDataRead();
 // item.requestDataUpdate();

