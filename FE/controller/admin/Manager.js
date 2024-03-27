//product
const loadProductByAjax = () => {
  console.log("search");
  let name = document.querySelector(".search-bar .search-input input").value;
  console.log(name);
  $.ajax({
    url:"../FE/html/admin/product.php",
    type:"POST",
    data:{
      name:name,
    },
    dataType:"html",
    success: function(data){
      document.querySelector("#content").innerHTML = data;
      document.querySelector(".search-bar .search-input input").value = name;

    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      console.error("AJAX request failed:", textStatus, errorThrown);
    },
  });
};
const updateProductInfo = (id, name, kind, gender, image, price, description, status, quantity) => {
  $.ajax({
    url:
      "../FE/controller/admin/util/Manager.php?&id=" + id +
      "&name=" + name +
      "&kind=" + kind +
      "&gender=" + gender +
      "&image=" + image +
      "&price=" + price +
      "&description=" + description +
      "&status=" + status +
      "&quantity=" + quantity +
      "&action=updateProductInfo",
    type: "PUT",
    success: function (res) {
      //console.log(res);
      
    },
  });
};
const updateProduct = (id) => {
  let name = document.querySelector("#edit-product .product_name").value;
  let kind = document.querySelector("#edit-product .product_kind").value;
  let gender = document.querySelector("#edit-product .product_gender").value;
  let price = document.querySelector("#edit-product .product_price").value;
  let productImageRaw = document.querySelector(".img-container img").src;
  var parts = productImageRaw.split('/');
  var image = parts.slice(5).join('/');
  let description = document.querySelector(
    "#edit-product .product_description"
  ).value;
  let status = document.querySelector("#edit-product .product_status").value;
  let quantity = document.querySelector("#edit-product .product_quantity").value;
  updateProductInfo(
    id, name, kind, gender, image, price, description, status, quantity);
  loadPageByAjax("Sản phẩm");
  loadModalBoxByAjax("detailProduct", id);
};
const deleteProduct = (id) => {
  $.ajax({
    url: "../FE/controller/admin/util/Manager.php?&id=" + id + "&action=deleteProduct",
    type: "PUT",
    success: function (res) {
      //console.log(res);
      loadPageByAjax("Sản phẩm");
    },
  });
  loadPageByAjax("Sản phẩm");
};

const addNewProduct = (id, name, kind, gender, price, image, description, status) => {
  console.log(id);
  $.ajax({
    type: "POST",
    url: "../FE/controller/admin/util/Manager.php",
    data: {
      id: id,
      name: name,
      kind: kind,
      gender: gender,
      price: price,
      image: image,
      description: description,
      status: status,
      action: "addNewProduct",
    },
    dataType: 'json',
    success: function (res) {
      if(res.success == true) {
        
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      console.error("AJAX request failed:", textStatus, errorThrown);
    }
  });
};

const newProduct = () => {
  let id = document.querySelector("#new-product .product_id").value;
  let name = document.querySelector("#new-product .product_name").value;
  let kind = document.querySelector("#new-product .product_kind").value;
  let gender = document.querySelector("#new-product .product_gender").value;
  let price = document.querySelector("#new-product .product_price").value;
  let productImageRaw = document.querySelector(".img-container img").src;
  var parts = productImageRaw.split('/');
  var image = parts.slice(5).join('/');
  let description = document.querySelector(
    "#new-product .product_description"
  ).value;
  let status = document.querySelector("#new-product .product_status").value;
  addNewProduct(id, name, kind, gender, price, image, description, status);
};
// order
const updateOrderInfo = (id, status) => {
  console.log("updateOrderInfo");
    $.ajax({
      url: "../FE/controller/admin/util/Manager.php",
      type: "POST",
        data: {
          id : id,
          status : status,
          action: "updateOrder"
        }, 
        dataType:'json',
        success: function(res) {
          loadPageByAjax("Đơn hàng");
          loadModalBoxByAjax("detailOrder", id);
          if(res.success == false) {
            console.log(res);alert(res);  
        }
        
        
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
            console.error("AJAX request failed:", textStatus, errorThrown);
          }
         
    });
  };
  
  const updateOrder = () => {
    let status = document.querySelector("#edit-order .modal-box .modal-left .modal-info .modal-item .item-input .order_status").value;
    let id = document.querySelector("#edit-order .order_id").value;
    console.log("updateOrder");
    updateOrderInfo(id, status);
  };
//account
const updateAccountInfo = (id,name,username,password,email,phone,gender,role,address,status,image) => {
  console.log("updateAccountInfo");
    $.ajax({
      url: "../FE/controller/admin/util/Manager.php",
      type: "POST",
        data: {
          id : id,
          name : name,
          username :username,
          password : password,
          email : email,
          phone :phone,
          gender : gender,
          role : role,
          address : address,
          image : image,
          status : status,
          action: "updateAccount"
        }, 
        dataType:'json',
        success: function(res) {
          loadPageByAjax("Tài khoản");
          loadModalBoxByAjax("detailAccount", id);
          if(res.success == false) {
            console.log(res);  
        }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
            console.error("AJAX request failed:", textStatus, errorThrown);
          }
         
    });
  };
const updateAccount = () => {
  let id = document.querySelector("#edit-account .account_id").value;
  let username = document.querySelector("#edit-account .account_username").value;
  let password = document.querySelector("#edit-account .account_password").value;
  let name = document.querySelector("#edit-account .account_name").value;
  let email = document.querySelector("#edit-account .account_email").value;
  let phone = document.querySelector("#edit-account .account_phone").value;
  let gender = document.querySelector("#edit-account .account_gender").value;
  let role = document.querySelector("#edit-account .account_role").value;
  let address = document.querySelector("#edit-account .account_address").value;
  let status = document.querySelector("#edit-account .account_status").value;
  let image = document.querySelector("#edit-account .account_image").value;
  console.log("updateAccount");
  updateAccountInfo(id,name,username,password,email,phone,gender,role,address,status,image);
};
const deleteAccount = (id) => {
  $.ajax({
    url: "../FE/controller/admin/util/Manager.php?&id=" + id + "&action=deleteAccount",
    type: "PUT",
    success: function (res) {
      console.log(res);
      
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      console.error("AJAX request failed:", textStatus, errorThrown);
    },
    
  });
  loadPageByAjax("Tài khoản");
};