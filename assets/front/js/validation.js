$(document).ready(function(){
    var get_Base_Url = $('#get_base_url').val();
$(function(){
    $('#resturent_search').validate({
        errorElement: "label",
        rules: {
            city_id: {
                    required:true,
                    },
        },
        messages: {
            city_id:{
                    required: "",
                    },
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });




$(function(){
$('#student_register').validate({

        errorElement: "label",
        rules: {
                fname: {
                        required:true,
                    },
                lname: {
                        required:true,
                    },
                phone: {
                        required:true,
                        number: true,
                },
                email: {
                        required:true,
                        email:true,
                },        
                password: {
                        required:true,
                        minlength: 6,
                        maxlength: 12,
                        alphanumeric: true,
                        pwchecknumber: true,
                       
                },
                conpassword: {
                        required:true,
                        equalTo : "#password"
                       
                },
                c_year: {
                        required:true,
                },
                country: {
                        required:true,
                },
                city: {
                        required:true,
                },
                university: {
                        required:true,
                },
                course: {
                        required:true,
                },
                description: {
                        required:true,
                },
              
        },
        messages: {
                fname:{
                        required: "First Name is required.",
                },
                lname:{
                        required: "Last Name is required.",
                },
                phone:{
                        required: "Mobile Number is required.",
                        number: "Please enter only 0 to 9.",

                },
                email:{
                        required: "Email is required.",
                        email: "Enter a valid email address",
                    
                },
                password:{
                        required: "Password is required.",
                        minlength: "Your Password must be at least 6 characters long.",
                        maxlength: "Your Password must be 12 characters.",
                        alphanumeric: "Your Password must be Letters and numbers.",

                }, 
                conpassword:{
                        required: "Confirm Password is required.",
                        equalTo: "Your Password noy match.",
                        
                },
                c_year: {
                        required:"College year is required.",
                },
                country: {
                        required:"Country is required.",
                },
                city: {
                        required:"City is required.",
                },
                university: {
                        required:"University is required.",
                },
                course: {
                        required:"Course is required.",
                },
                description: {
                        required:"Description is required.",
                },
                
        },
        submitHandler: function (form) {

        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
               if(response=="Already"){
               myFunctionMSG();
             }
             else{
                 
              window.location.href = response; 
         
                }
              
            }            
        });
        }
});
});



$(function(){
$('#mentor_register').validate({

        errorElement: "label",
        rules: {
                fname: {
                        required:true,
                    },
                lname: {
                        required:true,
                    },
                phone: {
                        required:true,
                        number: true,
                },
                email: {
                        required:true,
                        email:true,
                },        
                password: {
                        required:true,
                        minlength: 6,
                        maxlength: 12,
                        alphanumeric: true,
                        pwchecknumber: true,
                       
                },
                conpassword: {
                        required:true,
                        equalTo : "#password"
                       
                },
                category_id: {
                        required:true,
                },
                module_id: {
                        required:true,
                },
                country: {
                        required:true,
                },
                city: {
                        required:true,
                },
                university: {
                        required:true,
                },
                bio: {
                        required:true,
                },
                about_us: {
                        required:true,
                },
              
        },
        messages: {
                fname:{
                        required: "First Name is required.",
                },
                lname:{
                        required: "Last Name is required.",
                },
                phone:{
                        required: "Mobile Number is required.",
                        number: "Please enter only 0 to 9.",

                },
                email:{
                        required: "Email is required.",
                        email: "Enter a valid email address",
                    
                },
                password:{
                        required: "Password is required.",
                        minlength: "Your Password must be at least 6 characters long.",
                        maxlength: "Your Password must be 12 characters.",
                        alphanumeric: "Your Password must be Letters and numbers.",

                }, 
                conpassword:{
                        required: "Confirm Password is required.",
                        equalTo: "Your Password noy match.",
                        
                },
                category_id: {
                        required:"category is required.",
                },
                module_id: {
                        required:"Module is required.",
                },
                country: {
                        required:"Country is required.",
                },
                city: {
                        required:"City is required.",
                },
                university: {
                        required:"University is required.",
                },
                bio: {
                        required:"Please enter your bio.",
                },
                about_us: {
                        required:"Please enter how you found out about us.",
                },
                
                
        },
        submitHandler: function (form) {

        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
               if(response=="Already"){
               myFunctionMSG();
             }
             else{
                 
              window.location.href = response; 
         
                }
              
            }            
        });
        }
});
});

function myFunctionMSG() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}   

$(function(){
$('#student_login').validate({

        errorElement: "label",
        rules: {
                email: {
                        required:true,
                        email:true,
                        
                },
                password: {
                        required:true,
                        
                },
               
              
        },
        messages: {
                email:{
                        required: "Email is required.",
                        email: "Please enter valid Email.",
                },
                password:{
                        required: "Password is required.",
                        
               }, 
               
            
            submitHandler: function (form) {
            form.submit();
        }
    },

        
    });
    });


$(function(){
$('#mentor_login').validate({

        errorElement: "label",
        rules: {
                email: {
                        required:true,
                        email:true,
                        
                },
                password: {
                        required:true,
                        
                },
               
              
        },
        messages: {
                email:{
                        required: "Email is required.",
                        email: "Please enter valid Email.",
                },
                password:{
                        required: "Password is required.",
                        
               }, 
               
            
            submitHandler: function (form) {
            form.submit();
        }
    },

        
    });
    });



$(function(){
$('#contact').validate({

        errorElement: "label",
        rules: {
                f_name: {
                        required:true,
                },
                email: {
                        required:true,
                        email:true,
                },
                mobile: {
                        required:true,
                },
                description: {
                        required:true,
                },
              
        },
        messages: {
                f_name:{
                        required: "Name is required.",
                },
                email:{
                        required: "Email is required.",
                        email: "Please enter valid Email.",
               },
               mobile:{
                        required: "Phone number is required.",
                        number: "Please enter only Number.",
               },
              
               description:{
                        required: "Meassage is required.",
                      
               },
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });

$(function(){
$('#user_feedback').validate({

        errorElement: "label",
        rules: {
                feed_name: {
                        required:true,
                },
                feed_email: {
                        email:true,
                        required:true,
                },
                feed_type: {
                        required:true,
                       
                },
                feed_subject: {
                        required:true,
                },
                feed_message: {
                        required:true,
                },
              
        },
        messages: {
                feed_name:{
                        required: "Name is required.",
                },
                feed_email:{
                        required: "Email is required.",
                        email: "Please enter valid Email.",
               },
               feed_type:{
                        required: "Type is required.",
                        
               },
               feed_subject:{
                        required: "Subject is required.",
               },
               feed_message:{
                        required: "Meassage is required.",
                      
               },
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });

$(function(){
$('#book_payment').validate({

        errorElement: "label",
        rules: {
                autopayment: {
                        required:true,
                },
              
        },
        messages: {
                autopayment:{
                        required: "Payment method is required.",
                },
               
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });


//for user update profile
$(function(){
$('#user_update_profile').validate({

        errorElement: "label",
        rules: {
                u_name: {
                        required:true,
                        lettersonly:true,
                    },
                u_mobile: {
                        required:true,
                        number: true,
                        maxlength: 10,
                },
                u_email: {
                        required:true,
                        email:true,
                },        
                u_password: {
                        required:true,
                        minlength: 8,
                },
                u_dob: {
                        required:true,
                },
                
              
        },
        messages: {
                u_name:{
                        required: "Name is Compulsory.",
                        lettersonly:"Enter Only Letters.",
                },
                u_mobile:{
                        required: "Mobile Number is Compulsory.",
                        number: "Please enter only 0 to 9.",
                        maxlength:"Please enter only 10 degite number.",
                },
                u_email:{
                        required: "Email is Compulsory.",
                        email: "Please enter a valid email address.",
                },
                u_password:{
                        required: "Password is Compulsory.",
                        minlength: "Your Password must be at least 8 characters long.",
                },
                u_dob:{
                        required: "DOB is Compulsory.",
                },
                
                
        },
        submitHandler: function (form) {

         $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
               
                $('#message_update').html(response);
               // Show the success message
               $('#message_update').show();

            // Define a timeout after which fade out the success message.  
            setTimeout(function () { $('#message_update').fadeOut('fast'); }, 2000);
                     
           
              
            }            
        });
        }
});
});

//for user password change
$(function(){
$('#user_update_pass').validate({

        errorElement: "label",
        rules: {
                old_pass: {
                        required:true,
                        minlength: 6,
                        maxlength: 12,
                    },
                new_pass: {
                        required:true,
                        minlength: 6,
                        maxlength: 12,
                        pwcheckuppercase: true,
                        pwchecknumber: true,
                },        
                conf_pass: {
                        required:true,
                        equalTo: "#new_pass",
                },
               
              
        },
        messages: {
                old_pass:{
                        required: "Old Password is Compulsory.",
                        minlength: "Your Password must be at least 6 characters long.",
                        maxlength: "Your Password must be 12 characters.",
                },
                new_pass:{
                        required: "New Password is Compulsory.",
                        minlength: "Your Password must be at least 6 characters long.",
                        maxlength: "Your Password must be 12 characters.",
                },
                conf_pass:{
                        required: "Confirm Password is Compulsory.",
                        equalTo: "Not match password.",
                },
                
                
        },
        submitHandler: function (form) {

       $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
               
                $('#message_change').html(response);
               // Show the success message
               $('#message_change').show();

            // Define a timeout after which fade out the success message.  
            setTimeout(function () { $('#message_change').fadeOut('fast'); }, 2000);
                     
           
              
            }            
        });
        }
});
});

$(function(){
$('#add-book').validate({

        errorElement: "label",
        rules: {
                book_name: {
                        required:true,
                        
                }, 
                price: {
                        required:true,
                        
                },
                author: {
                        required:true,
                        
                },
                location: {
                        required:true,
                        
                },
                edition: {
                        required:true,
                        
                },
                book_university: {
                        required:true,
                        
                },
                book_course: {
                        required:true,
                        
                        
                },
                book_module: {
                        required:true,
                        
                },
                fileToUpload: {
                        required:true,
                        
                },
                
        },
        messages: {
                book_name:{
                        required: "Book name is required.",
                },
                price:{
                        required: "Price is required.",
                },
                author:{
                        required: "Please enter Author Name.",
               },
               location:{
                        required: "Location is required.",
               },
               edition:{
                        required: "Book Edition is required.",
               },
               book_university:{
                        required: "Book university is required.",
                       
               },
               book_course:{
                        required: "Book course is required.",
                       
               },
               book_module:{
                        required: "Book module is required.",
               },
               fileToUpload:{
                        required: "Book image is required.",
               },
              
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });

$(function(){
        
        $('#complaint_frm').validate({
            rules:{
                
                issue_type:{
                    required:true
                },
                issue_name:{
                    required:true,
                     maxlength: 30,
                },
                complaint_id:{
                    required:true
                },
                description:{
                    required:true
                },
                
                
        
            },
            messages:{
                
                issue_type:{
                    required:"Please select complaint."
                },
                issue_name:{
                    required:"Plasae enter an issue.",
                    maxlength:"maximum 30 characters use."
                },
                complaint_id:{
                    required:"Please enter Order Id."
                },
                description:{
                    required:"Please enter description."
                },
                
                
                
            }
        });
    });


$(function(){
$('#eventupdate').validate({

        errorElement: "label",
        rules: {
                name: {
                        required:true,
                },
                email: {
                        email:true,
                        required:true,
                },
                mobile: {
                        number:true,
                        maxlength:10,
                       
                },
                e_title: {
                        required:true,
                },
                e_date: {
                        required:true,
                },
                e_time: {
                        required:true,
                }, 
                e_location: {
                        required:true,
                }, 
                e_description: {
                        required:true,
                }, 
                file: {
                        required:true,
                },
              
        },
        messages: {
                name:{
                        required: "Name is required.",
                },
                email:{
                        required: "Email is required.",
                        email: "Please enter valid Email.",
               },
               mobile:{
                        number: "Only number allow.",
                         maxlength:"Please enter only 10 degite number.",
                        
               },
               e_title:{
                        required: "Event Title is required.",
               },
               e_date:{
                        required: "Event Date is required.",
                      
               },
               e_time:{
                        required: "Event Time is required.",
                      
               },
               e_location:{
                        required: "Event Location is required.",
                      
               },
               e_description:{
                        required: "Event Description is required.",
                      
               },
               file:{
                        required: "Event Banner is required.",
                      
               },
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });



$(function(){
$('#ads_request').validate({

        errorElement: "label",
        rules: {
                company_name: {
                        required:true,
                },
                company_email: {
                        email:true,
                        required:true,
                },
                company_mobile: {
                        number:true,
                        maxlength:10,
                       
                },
                adv_link: {
                        required:true,
                },
                e_date: {
                        required:true,
                },
                e_time: {
                        required:true,
                }, 
                e_location: {
                        required:true,
                }, 
                e_description: {
                        required:true,
                }, 
                file: {
                        required:true,
                },
              
        },
        messages: {
                company_name:{
                        required: "Company Name is required.",
                },
                company_email:{
                        required: "Company Email is required.",
                        email: "Please enter valid Email.",
               },
               company_mobile:{
                        number: "Only number allow.",
                        maxlength:"Please enter only 10 degite number.",
                        
               },
               adv_link:{
                        required: "Lisk is required.",
               },
               file:{
                        required: "Ads image is required.",
                      
               },
        submitHandler: function (form) {
            form.submit();
        }
    },
    });
    });



    


            }); 






