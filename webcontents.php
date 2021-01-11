<style>
    #contents{
        height:300px;
        /*background-color:lightgreen;*/
        display:none;
        padding:20px;
        margin-top:80px;
        //overflow-y:scroll;
        color:white;
    }
    #title{
        color:green;
        text-decoration: none;
        font-size:20px;
    }
    #project1, #project2, #project3 {
        display:none;
        /*background-color:white;*/
        height:800px;
        /*overflow-x:scroll;*/
        width:100%;
        padding:10px;
    }
</style>
<div id="contents">
    <a name="title" id="title"></a>
    <div id="project1">
        <?php include "project1.php" ; ?> 
    </div>
    <div id="project2">
        <?php include "project2.php" ; ?> 
    </div>
    <div id="project3">
        <?php include "project3.php" ; ?> 
    </div>
</div>