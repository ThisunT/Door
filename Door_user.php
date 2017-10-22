<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>

<div class="folding-wrapper">

        <div class="folding-content">
            <?php echo $this->session->flashdata('success_msg'); ?>
            <?php echo $this->session->flashdata('error_msg'); ?>
            <!-- Profile Junk -->
            </div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('');?>
            <div class="contact-form-container">
               <form role="form" method="post" enctype="multipart/form-data">
                    <div class="navbar">
                        <img src="'<?php echo base_url(); ?>'images/door.jpg" "alt="Girl in a jacket">
                    </div>
                    <div>
                        <label for="Name" id="Name">
                            <span class="entypo-user"></span>
                        </label>
                        <input type="text" name="name" placeholder="Name" />
                    </div>

                    <div>
                        <label for="Email" id="Email">
                            <span class="entypo-mail"></span>
                        </label>
                        <input type="email" name="Email" placeholder="Email" />
                    </div>

                    <div>
                        <label for="Phone" id = "Phone">
                            <span class="entypo-phone"></span>
                        </label>
                        <input type="phone" name="Phone" placeholder="Phone Number" />
                    </div>

                    <div>
                        <label for="Live" id="Live">
                            <span class="entypo-live"></span>
                        </label>
                        <input type="text" name="live" placeholder="Live in" />
                    </div>
                    <div class="gender">
                        <label for="gender" id="Gender">
                        </label>
                      <br>
                       <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                    </div>

                    <div>
                        <label for="message" class="textarea-label" id="Message">
                            <span class="entypo-pencil"></span>
                        </label>
                        <textarea name="Message" placeholder="About you"></textarea>
                    </div>
                    <div class="image">
                         <label for="message" class="textarea-label">
                            <span class="entypo-image"></span>
                        </label>
                            <input type="file" name="picture" size="20">
                            <br>
                            <input type="submit" name="submit" value="upload">
                     </div>
                    <div id="send">
                        <span class="entypo-paper-plane"></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Wrapper -->
    </div>
    <style type="text/css">
             font-family: 'entypo', sans-serif;
        }

        .entypo-mail {
            margin-right: 10px;

        }
        .gender{
            font-size: 14px;
            color: #bdc3c7;
            font-family: sans-serif;
        }

        /* Let the Styling Begin! */

        /* ClearFix Hack */

        .cf:before,
        .cf:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }

        .cf:after {
            clear: both;
        }

        /**
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */
        .cf {
            *zoom: 1;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            min-height: 100%;
            width: 100%;
            background-color: #16a085;
            font-size: 20px;
            font-family: 'Pathway Gothic One', sans-serif;
        }

        h1, h4 {
            color: #FFF;
            text-transform: uppercase;
            text-align: center;
        }

        h1 {
            font-size: 3.25em;
        }

        h4 {
            font-size: 2.25em;
        }

        p {
            font-size: 1.25em;
            padding: 0.75em;
        }

        a {
            text-decoration: none;
            color: #edfeff;
            font-weight: 400;
            font-size: 1.25em;
        }

        /* Launch Styles */

        #launch-button {
            display: block;
            position: relative;
            background-color: #e04646;
            margin: 0 auto 4em;
            width: 100%;
            height: 40px;
            padding: 15px 0 5px;
            border-bottom: 4px solid #bc2525;
            text-align: center;
            color: #FFF;
            text-transform: uppercase;
        }

        /* Containing Styles */

        .folding-wrapper {
            margin: 0 auto;
            width: 50%;
            height: auto;
            float: left;;
        }

        /* Profile Styles*/




            .profile p {
                color: #FFF;
                text-align: center;
                padding: 0.125em;
                margin: 0.5em 0 0;
            }

            .profile .job {
                width: 200px;
                background-color: rgba(0,0,0,0.6);
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                font-weight: 300;
                font-size: 0.85em;
                padding: 0.2725em;
                margin: 0.5em auto 1em;
                text-shadow: 0px 0px 5px #000000;
                filter: dropshadow(color=#000000, offx=0, offy=2);
            }

        .social {
            width: 100%;
            margin: 0;
            padding: 0;
        }

            .social > li {
                margin: 0 -0.5em 0 0;
                display: inline-block;
                width: 21%;
                padding: 0.5em 0;
                color: #2c3e50;
                font-size: 1.25em;
                background-color: #2c3e50;
                text-align: center;
                cursor: pointer;
            }

                .social > li:hover {
                    background-color: #95a5a6;
                    -webkit-transition: background-color 0.125s ease-in;
                }

        .profile-photo {
            margin: 0 auto;
            display: block;
            width: 8em;
            height: 8em;
            border: solid 3px white;
            -webkit-border-radius: 4em;
            -moz-border-radius: 4em;
            border-radius: 4em;
            box-shadow: -1px 2px 6px 1px #141211;
        }
        .navbar{
            width: 100%;
            height: 180px;
        }
            

        /* Form Styles */

        .contact-form {
            position: relative;
            margin: 50 auto;
            padding: 1em 1em 0;
            width: 22em;
            background-color: #194b67;
        }

            .contact-form div {
                display: block;
                width: inherit;
            }

        label {
            margin: 0 0 0.75em;
            position: relative; 
            display: inline-block;
            color: #fff;
            background-color: #e04646;
            height: 1.25em;
            width: 1.25em;
            padding: 0.2em;
            text-align: center;
            vertical-align: middle;
            font-size: 1.125em;
            font-family:sans-serif;
        }

            label > span {
                position: absolute;
                top: 0.25em;
                left: 0.38em;
                margin: 0;
                padding: 0;
            }

        .textarea-label {
            position: relative;
            height: 171px;
        }


        input[type="text"], input[type="Email"], input[type="phone"], input[type="file"],input[type="submit"],textarea {
            display: inline-block;
            margin: 0 0 0.75em;
            width: 31.9em;
            height: 3em;
            padding-left: 0.5em;
            outline: none;
            font-size: 0.625em;
            background-color: #e2f1f6;
            border: none;
            vertical-align: top;
            -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
            -moz-box-sizing: border-box; /* Firefox, other Gecko */
            box-sizing: border-box;
            text-transform: uppercase;
        }

        #send {
            width: 50px;
            margin: 0 auto;
            color: #FFF;
            text-align: right;
            font-size: 2.5em;
            padding: 0;
            cursor: pointer;
        }

        textarea {
            height: 180px;
            -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
            -moz-box-sizing: border-box; /* Firefox, other Gecko */
            box-sizing: border-box;
        }

            input[type="text"]:focus, input[type="Email"]:focus, input[type="phone"]:focus, textarea:focus {
                background-color: white;
                color: #444;
            }

        new {
            /* Using the custom font we've included in the HTML tab: */
            font-family: Satisfy, cursive;
            font-weight: normal;
            font-size: 24px;
            padding-top: 60px;
        }
    </style>
</body>
</html>
 