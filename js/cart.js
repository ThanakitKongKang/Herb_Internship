// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];

  // Constructor
  function Item(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count) {
    this.product_id = product_id;
    this.product_name = product_name;
    this.product_type = product_type;
    this.product_potent = product_potent;
    this.product_amount = product_amount;
    this.product_cost = product_cost;
    this.product_price = product_price;
    this.product_price_discount = product_price_discount;
    this.product_stock = product_stock;
    this.count = count;
  }

  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }

  // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};

  // Add to cart
  obj.addItemToCart = function (product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        if (cart[item].count === cart[item].product_stock || cart[item].product_stock === 0) {
          Swal.fire({
            title: 'ผิดพลาด สินค้าในสต็อกไม่พอ!',
            html: '<div>มี <span class="text-primary">' + cart[item].product_name + ' ' + cart[item].product_potent + '</span> ในสต็อก <span class="text-primary">' + cart[item].product_stock + ' </span>ชิ้น</div>' +
              '<div style="font-size:0.75em" class="text-secondary">และมีในตะกร้าอยู่แล้ว ' + cart[item].count + ' ชิ้น</div>',
            type: 'error',
            confirmButtonText: 'ลองอีกครั้ง',
            timer: 1500
          })

        }
        else if (cart[item].count < cart[item].product_stock) {
          cart[item].count++;
          saveCart();
        }
        return;
      }
    }
    if (product_stock === 0) {
      Swal.fire({
        title: 'ผิดพลาด สินค้าในสต็อกไม่พอ!',
        text: 'มี ' + product_name + ' ในสต็อก ' + product_stock + ' ชิ้น',
        type: 'error',
        confirmButtonText: 'ลองอีกครั้ง',
        timer: 1500
      })
      return;
    }

    var item = new Item(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, count);
    cart.push(item);
    saveCart();

  }
  // Set count from item
  obj.setCountForItem = function (product_id, count) {
    for (var i in cart) {

      if (cart[i].product_id === product_id) {
        if (count > cart[i].product_stock || count < 0) {
          Swal.fire({
            title: 'ผิดพลาด สินค้าในสต็อกไม่พอ!',
            html: '<div>มี <span class="text-primary">' + cart[i].product_name + ' ' + cart[i].product_potent + '</span> ในสต็อก <span class="text-primary">' + cart[i].product_stock + ' </span>ชิ้น</div>',
            type: 'error',
            confirmButtonText: 'ลองอีกครั้ง',
            timer: 1500
          })
          return;
        }
        else if (count === 0) {
          cart.splice(item, 1);
          saveCart();
          return;
        }
        cart[i].count = count;
        break;

      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function (product_id) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        cart[item].count--;
        if (cart[item].count === 0) {
          cart.splice(item, 1);
        }
        break;
      }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function (product_id) {
    for (var item in cart) {
      if (cart[item].product_id === product_id) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function () {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function () {
    var totalCount = 0;
    for (var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function () {
    var totalCart = 0;
    for (var item in cart) {
      totalCart += cart[item].product_price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function () {
    var cartCopy = [];
    for (i in cart) {
      item = cart[i];
      itemCopy = {};
      for (p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.product_price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function (event) {
  event.preventDefault();
  var product_id = Number($(this).data('product_id'));
  var product_name = $(this).data('product_name');
  var product_type = $(this).data('product_type');
  var product_potent = $(this).data('product_potent');
  var product_amount = $(this).data('product_amount');
  var product_cost = Number($(this).data('product_cost'));
  var product_price = Number($(this).data('product_price'));
  var product_price_discount = Number($(this).data('product_price_discount'));
  var product_stock = Number($(this).data('product_stock'));

  shoppingCart.addItemToCart(product_id, product_name, product_type, product_potent, product_amount, product_cost, product_price, product_price_discount, product_stock, 1);
  // shoppingCart.addItemToCart(product_id, product_name, product_price, 1);
  displayCart();
});

// Clear items
$('.clear-cart').click(function () {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "<tr><th>ชื่อ</th><th>ราคา</th><th class='text-center'>จำนวน</th><th></th><th>รวม</th></tr>";
  for (var i in cartArray) {
    output += "<tr>"
      + "<td name='name'>" + cartArray[i].product_name + "</td>"
      + "<td name='price'>" + cartArray[i].product_price + "</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-product_id=" + cartArray[i].product_id + ">-</button>"
      + "<input type='number' min='1' max=" + cartArray[i].product_stock + " class='item-count form-control' data-product_id='" + cartArray[i].product_id + "'data-product_stock='" + cartArray[i].product_stock + "' value='" + cartArray[i].count + "'>"
      + "<button class='plus-item btn btn-primary input-group-addon' data-product_id=" + cartArray[i].product_id + ">+</button></div></td>"
      + "<td><button class='delete-item btn btn-danger' data-product_id=" + cartArray[i].product_id + ">X</button></td>"
      + " = "
      + "<td>" + cartArray[i].total + "</td>"
      + "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
  // console.log(cartArray);
  // console.dir(cartArray);
}

// -1
$('.show-cart').on("click", ".minus-item", function (event) {
  var product_id = Number($(this).data('product_id'));
  shoppingCart.removeItemFromCart(product_id);
  // console.log("call success minus");

  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function (event) {
  var product_id = Number($(this).data('product_id'));
  shoppingCart.addItemToCart(product_id);
  // console.log("call success plus");

  displayCart();
})

// Delete item button

$('.show-cart').on("click", ".delete-item", function (event) {
  var product_id = Number($(this).data('product_id'))
  shoppingCart.removeItemFromCartAll(product_id);
  // console.log("call success delete");
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function (event) {
  var product_id = Number($(this).data('product_id'));
  var count = Number($(this).val());
  shoppingCart.setCountForItem(product_id, count);
  displayCart();
});

$('.cart-button').on("click", ".calculate-cart", function (event) {

  $.ajax({
    type: 'POST',
    url: './model/model_order_history_make.php', // the url where we want to POST
  })

  var cartArray = shoppingCart.listCart();
  for (var i in cartArray) {
    var formData = {
      'product_id': cartArray[i].product_id,
      'product_price': cartArray[i].product_price,
      'count': cartArray[i].count
    };
  
    $.ajax({
      type: 'POST',
      url: './model/model_order_detail_make.php', // the url where we want to POST
      data: formData, // our data object
    })

  }
  Swal.fire({
    title: 'สำเร็จ !',
    text: 'บันทึกรายการขายในฐานข้อมูล!',
    type: 'success',
    confirmButtonText: 'ตกลง',
    timer: 1500
  })
  shoppingCart.clearCart();
  displayCart();
})

displayCart();