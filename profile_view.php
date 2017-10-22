<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="vcard">
  <div id="card-content">
    <div id="profile">
      <span class="avatar">
        <span class="typicons-user icon"></span>
        <span class="info">
         John Doe
          <br />
         john.doe@freelancer.com
        </span>
      </span>
    </div>
    <div id="options">
      <ul>
        <li><span class="typicons-anchor icon"></span>WEBSITE</li>
        <li><span class="typicons-export icon"></span>SHARE</li>
        <li><span class="typicons-plus icon"></span>FOLLOW</li>
        <li><span class="typicons-tab icon"></span>HIRE</li>
      </ul>
    </div>
  </div>
  <div id="side-bar">
    <ul>
      <li><span class="typicons-user icon"></span>PROFILE</li>
      <li><span class="typicons-list icon"></span>PROJECTS</li>
      <li><span class="typicons-spanner icon"></span>SKILLS</li>
      
    </ul>
  </div>
</div>
<style type="text/css">
	/* typicons */
[class*="typicons-"]:before {
  font-family: 'Typicons', sans-serif;
}

body {
 background-image: radial-gradient(circle farthest-corner at center, #606060 20%, #414141 100%);
}
#vcard {
  margin: 0 auto;
  width: 600px;
  height: 350px;
  background: #31A66C;
  border-radius: 4px;
  box-shadow: 0px 5px 15px rgba(0,0,0, .3);
}
#card-content {
  width: 500px;
  float: left;
  height: 100%;
  
}
#side-bar {
  width: 100px;
  float: left;
  background: #fff;
  height: 100%;
  border-radius: 0 4px 4px 0;
  box-shadow: -5px 0px 15px rgba(0,0,0, .3);
}
#profile {
  height: 200px;
  border-bottom: solid 1px rgba(255,255,255,.2);
}
#options ul {
  margin: 0;
  padding: 0;
}
#options ul li{
  text-align: center;
  font-family: Exo;
  font-size: 14px;
  color: white;
  list-style-type: none;
  display: inline-block;
  float: left;
  width: 123px;
  height: 100px;
  border-right: solid 1px rgba(255,255,255,.2);
  text-shadow: 1px 1px 3px rgba(0,0,0,.3);
}
#options ul li:last-child{

  border-right: none;
}
#options ul li span.icon {
  display: block;
  margin-top: 25px;
  color: white;
  font-size: 24px;
  line-height: 32px;
}

#side-bar ul {
  margin: 0;
  padding: 0;
}
#side-bar ul li{
  
  text-align: center;
  font-family: Exo;
  font-size: 12px;
  color: #414141;
  list-style-type: none;
  display: inline-block;
  float: left;
  width: 100px;
  height: 115px;
  border-bottom: solid 1px #eaeaea;
  
}
#side-bar ul li:last-child{

  border-bottom: none;
}
#side-bar ul li span.icon {
  display: block;
  margin-top: 25px;
  color: #414141;
  font-size: 36px;
  line-height: 32px;
}

#profile {
  padding-top: 50px;
  text-align: center;
  overflow: hidden;
}
span.avatar span.icon{
  display: inline-block;
  color: #414141;
  font-size: 72px;
  line-height: 100px;
  background: #46af7b;
  border: solid 3px rgba(255,255,255, .2);
  overflow: hidden;
  padding-top: 1px;
  width: 90px;
  height: 90px;
  border-radius: 46px;
}
span.info {
  padding-top: 10px;
  display: block;
  font-family: Exo;
  font-size: 18px;
  color: rgba(255,255,255, .7);
  font-weight: normal;
  text-shadow: 1px 1px 3px rgba(0,0,0,.3);
}
</style>



</body>
</html>