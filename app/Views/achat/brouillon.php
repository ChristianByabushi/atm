<!DOCTYPE html>
<html>
<head>
  <title>codeigniter 4 ajax insert form with validation</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
 
</head>
<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="javascript:void(0)" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
             
          </div> 
 
          <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
             
          </div>   
 
          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control"></textarea>
             
          </div>
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#ajax_form").length > 0) {
      $("#ajax_form").validate({
      
    rules: {
      name: {
        required: true,
      },
  
      email: {
        required: true,
        maxlength: 50,
        email: true,
      }, 
 
      message: {
        required: true,
      },   
    },
    messages: {
        
      name: {
        required: "Please enter name",
      },
      email: {
        required: "Please enter valid email",
        email: "Please enter valid email",
        maxlength: "The email name should less than or equal to 50 characters",
        },      
     message: {
        required: "Please enter message",
      },
         
    },
    submitHandler: function(form) {
      $('#send_form').html('Sending..');
      $.ajax({
        url: "<?php echo base_url('contact/create') ?>",
        type: "POST",
        data: $('#ajax_form').serialize(),
        dataType: "json",
        success: function( response ) {
            console.log(response);
            console.log(response.success);
            $('#send_form').html('Submit');
            $('#res_message').html(response.msg);
            $('#res_message').show();
            $('#res_message').removeClass('d-none');
 
            document.getElementById("ajax_form").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#res_message').html('');
            },10000);
        }
      });
    }
  })
}
</script>
</body>
</html>

















<html>
<head>
	<title>Form Validation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<form action="ajax.php" method="post" id="register-form" >
	First Name
	<input type="text" id="firstname" name="firstname" /><br /><br />
	Last Name
	<input type="text" id="lastname" name="lastname" /><br /><br />
	Email
	<input type="text" id="email" name="email" /><br /><br />
	Password
	<input type="password" id="password" name="password" /><br /><br />
	<input type="submit" name="submit" value="Submit" />
</form>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>	
<script>
$(function() {
	  
	$("#register-form").validate({
	  rules: {
			firstname: "required",
			lastname: {
				required: true,
				lettersonly: true
			},
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				number: true,
				minlength: 5
			}
		},
		messages: {
			firstname: "Please enter your first name",
			lastname: {
				required: "Please enter your last name",
				lettersonly: "Please enter only alphabetical characters"
			},
			password: {
				required: "Please provide a password",
				number: "Please provide a Numeric value",
				minlength: "Your password must be at least 5 characters long"
			},
			email: "Please enter a valid email address",
		},

		submitHandler: function(form) {
			$.ajax({
				url: form.action,
				type: form.method,
				data: $(form).serialize(),
				dataType: "json",
				success: function(response) {
					alert(response.message);
					location.reload();
				}            
			});
		}
	});
	
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please"); 

});
</script>
</body>
</html>













function validateForm(form, customSubmit) {
            //add custom method
            $.validator.addMethod("greaterThanOrEqual",
                    function (value, element, params) {
                        var paramsVal = params;
                        if (params && (params.indexOf("#") === 0 || params.indexOf(".") === 0)) {
                            paramsVal = $(params).val();
                        }

                        if (typeof $(element).attr("data-rule-required") === 'undefined' && !value) {
                            return true;
                        }

                        if (!/Invalid|NaN/.test(new Date(convertDateToYMD(value)))) {
                            return !paramsVal || (new Date(convertDateToYMD(value)) >= new Date(convertDateToYMD(paramsVal)));
                        }
                        return isNaN(value) && isNaN(paramsVal)
                                || (Number(value) >= Number(paramsVal));
                    }, 'Must be greater than {0}.');

            //add custom method
            $.validator.addMethod("greaterThan",
                    function (value, element, params) {
                        var paramsVal = params;
                        if (params && (params.indexOf("#") === 0 || params.indexOf(".") === 0)) {
                            paramsVal = $(params).val();
                        }
                        if (!/Invalid|NaN/.test(new Number(value))) {
                            return new Number((value)) > new Number((paramsVal));
                        }
                        return isNaN(value) && isNaN(paramsVal)
                                || (Number(value) > Number(paramsVal));
                    }, 'Must be greater than.');

            //add custom method
            $.validator.addMethod("mustBeSameYear",
                    function (value, element, params) {
                        var paramsVal = params;
                        if (params && (params.indexOf("#") === 0 || params.indexOf(".") === 0)) {
                            paramsVal = $(params).val();
                        }
                        if (!/Invalid|NaN/.test(new Date(convertDateToYMD(value)))) {
                            var dateA = new Date(convertDateToYMD(value)), dateB = new Date(convertDateToYMD(paramsVal));
                            return (dateA && dateB && dateA.getFullYear() === dateB.getFullYear());
                        }
                    }, 'The year must be same for both dates.');

            $(form).validate({
                submitHandler: function (form) {
                    if (customSubmit) {
                        customSubmit(form);
                    } else {
                        return true;
                    }
                },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                ignore: ":hidden:not(.validate-hidden)",
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            //handeling the hidden field validation like select2
            $(".validate-hidden").click(function () {
                $(this).closest('.form-group').removeClass('has-error').find(".help-block").hide();
            });
        }































$(document).ready(function () {
   const baseurl = "http://localhost/atm/public";
   $('[name="numero"]').on('click', function () {
      $.ajax({
         type: "GET",
         url: baseurl + "/dashboard/lastProductId",
         dataType: "JSON",
         success: function (data) {
            $('[name="numero"]').val(`${data + 1}`)
         }
      });
   })

   $("#btnSubmitProduct").on('click', function () {
      var myForm = document.getElementById('formNewProduct');
      form_data = new FormData(myForm); // i take all my data form 

      form_data.append('image', $('[name="image"]')[0].files[0]); // i get  and add the image from the form

      /*   'id' => $this->request->getPost('numero'),
                'title' => $this->request->getPost('title'),
                'qualite' => $this->request->getPost('qualite'),
                'dimension' => $this->request->getPost('dimension'),
                'idCategorie' => $this->request->getPost('categorie'),
                'description' => $this->request->getPost('description'),
                'created_at' => $this->request->getPost('create_at'),
                'image' => $file->getName(),
                'deleted' => 0,
            );
            $this->purchase->addP */

      $("form#data").validate({
         rules: {
            numero: {
               required: true,
            },
            qualite: {
               required: true,
            },
            description: {
               required: true,
            },
         },
         messages: {
            numero: {
               required: "Please enter first",
            },
            qualite: {
               required: "Please enter middle",
            },
            image: {
               description: "Please Select logo",
            },
         },

         submitHandler: function (form) {
            $.ajax({
               url: baseurl + "/dashboard/recordProduct",
               type: "POST",
               data: form_data,
               dataType: "JSON",
               contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
               processData: false, // NEEDED, DON'T OMIT THIS
               success: function (data) {
                  alert(data)

               },
               error: function (jqXHR, textStatus, errorThrown) {
                  alert('Erreur d\ data');
               }
            });
         }
      

      })

      //btnSubmitProduct 
      $.ajax({
         type: "GET",
         url: baseurl + "/dashboard/allCategorie",
         dataType: "JSON",
         success: function (data) {
            data.forEach(dataElement => {
               $('#chooseCategory').append(`<option value="${dataElement.id}">
            ${dataElement.title} </option>`);
            });
         }
      });

      function changeColor() {
         let value1 = parseInt(Math.random() * 12);
         let value2 = parseInt(Math.random() * 244);
         let value3 = parseInt(Math.random() * 244);
         document.querySelector(".container.header container").style.background = `rgb(${value1},${value2},${value3})`
      }
   }) 


   <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             <a class="pt-2 d-inline-block" href="index.html" data-abc="true">BBBootstrap.com</a>
             <div class="float-right">
                 <h3 class="mb-0">Invoice #BBB10234</h3>
                 Date: 12 Jun,2019
             </div>
         </div>
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6">
                     <h5 class="mb-3">From:</h5>
                     <h3 class="text-dark mb-1">Tejinder Singh</h3>
                     <div>29, Singla Street</div>
                     <div>Sikeston,New Delhi 110034</div>
                     <div>Email: contact@bbbootstrap.com</div>
                     <div>Phone: +91 9897 989 989</div>
                 </div>
                 <div class="col-sm-6 ">
                     <h5 class="mb-3">To:</h5>
                     <h3 class="text-dark mb-1">Akshay Singh</h3>
                     <div>478, Nai Sadak</div>
                     <div>Chandni chowk, New delhi, 110006</div>
                     <div>Email: info@tikon.com</div>
                     <div>Phone: +91 9895 398 009</div>
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">#</th>
                             <th>Item</th>
                             <th>Description</th>
                             <th class="right">Price</th>
                             <th class="center">Qty</th>
                             <th class="right">Total</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td class="center">1</td>
                             <td class="left strong">Iphone 10X</td>
                             <td class="left">Iphone 10X with headphone</td>
                             <td class="right">$1500</td>
                             <td class="center">10</td>
                             <td class="right">$15,000</td>
                         </tr>
                         <tr>
                             <td class="center">2</td>
                             <td class="left">Iphone 8X</td>
                             <td class="left">Iphone 8X with extended warranty</td>
                             <td class="right">$1200</td>
                             <td class="center">10</td>
                             <td class="right">$12,000</td>
                         </tr>
                         <tr>
                             <td class="center">3</td>
                             <td class="left">Samsung 4C</td>
                             <td class="left">Samsung 4C with extended warranty</td>
                             <td class="right">$800</td>
                             <td class="center">10</td>
                             <td class="right">$8000</td>
                         </tr>
                         <tr>
                             <td class="center">4</td>
                             <td class="left">Google Pixel</td>
                             <td class="left">Google prime with Amazon prime membership</td>
                             <td class="right">$500</td>
                             <td class="center">10</td>
                             <td class="right">$5000</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Subtotal</strong>
                                 </td>
                                 <td class="right">$28,809,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Discount (20%)</strong>
                                 </td>
                                 <td class="right">$5,761,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">VAT (10%)</strong>
                                 </td>
                                 <td class="right">$2,304,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark">$20,744,00</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card-footer bg-white">
             <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
         </div>
     </div>
 </div>



 $("#tablePrintListgood tbody").on('click', 'td:nth-child(7)', function () {
      if (confirm("voulez-vous effacer imprimer la facture concernée ?")) {
       var idGoodby  = ($(this).parent().find("td:nth-child(1)").text())
       let idGoodby  = ($(this).parent().find("td:nth-child(1)").text())
         $("#btnprintOneGoodby").attr("href", `${baseurl}/dashboard/printgoodby/${idGoodby}`)
         console.log($('#btnprintOneGoodby').attr("href")) 
         debugger  
    }
}) 

function calcResultPrint() {
      var sumSubtot = 0;
      $("table#tablePrintListgood #brutTotalPrintitem").each(function () {
         sumSubtot += parseFloat($(this).text())
      });
      $('.card-footer #totalGoodbyPrint').text(sumSubtot);
      var sReduct= 0;

      $("#tablePrintListgood tbody #reduceOnPricePrint").each(function () {
         sReduct += parseFloat($(this).text())
      });
      $('.card-footer #reductionGoodbyPrint').text(sumReduct);

      var sumNetApayer = 0
      $("#tablePrintListgood tbody #netOnPricePrint").each(function () {
         sumNetApayer += parseFloat($(this).text())
      }); 

      $('.card-footer #totalNetGoodbyPrint').text(`${sumNetApayer-sReduct}`);
      //netToPayFact
} 

