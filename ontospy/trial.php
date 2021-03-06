<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="check5.json"></script>
    <base href="http://demos.telerik.com/kendo-ui/treeview/checkboxes">
    <style>html { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title>
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1316/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1316/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1316/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1316/styles/kendo.dataviz.default.min.css" />

<!-- bootstrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="http://cdn.kendostatic.com/2014.3.1316/js/jquery.min.js"></script>
    <script src="http://cdn.kendostatic.com/2014.3.1316/js/kendo.all.min.js"></script>

    <!-- This is the style sheet for dynamically generated fields-->

        <style>

                label{
                        display: inline-block;
                        float: left;
                        clear: left;
                        width: 250px;
                        text-align: right;
                    }                       
                
                input{
                        display: inline-block;
                        float: left;
                    }

        </style>
    <!-- end of the stylesheet for for dynamically generated fields -->
    
</head>
<body>


<div id="example">

    <div class="demo-section k-header">
        <div class="box-col">
            <h4>Check nodes</h4>
            <div id="treeview"></div>
        </div>
        <div class="box-col">
            <h4>Status</h4>
            <p id="result">No nodes checked.</p>
        </div>
    </div>

    <script>
        $("#treeview").kendoTreeView({
            checkboxes: {
                checkChildren: true
            },

            check: onCheck,
            dataSource: data
        });

        // function that gathers IDs of checked nodes
        function checkedNodeIds(nodes, checkedNodes) {
            var gflag = false;
            for (var i = 0; i < nodes.length; i++) {
                var flag = false;
                if (nodes[i].hasChildren) {

                    if(checkedNodeIds(nodes[i].children.view(), checkedNodes)== true)
                        flag = true;
                }
                if (nodes[i].checked || flag) {
                    checkedNodes.push(nodes[i].id);
                    gflag = true;
                }
            }
            return gflag;
        }
        var str = "";
        // function dfs(nodes, checkedNodes) {
        //     for (var i = 0; i < nodes.length; i++) {
        //         bool flag = false;
        //         if (nodes[i].hasChildren) {
        //             dfs(nodes[i].children.view(), checkedNodes);
        //             flag = true;
        //         }
        //         if (nodes[i].checked) {
        //             checkedNodes.push(nodes[i].id);
        //         }

        //     }
        // }
        // show checked node IDs on datasource change
        function onCheck() {
            var checkedNodes = [],
                treeView = $("#treeview").data("kendoTreeView"),
                message;

            checkedNodeIds(treeView.dataSource.view(), checkedNodes);

            if (checkedNodes.length > 0) {
                message = "IDs of checked nodes: " + checkedNodes.join(",");
            } else {
                message = "No nodes checked.";
            }
            // dfs();
            // alert(str);
            $("#result").html(message);
        }
    </script>
    

    <style scoped>
        #treeview .k-sprite {
            background-image: url("../content/web/treeview/coloricons-sprite.png");
        }

        .rootfolder { background-position: 0 0; }
        .folder     { background-position: 0 -16px; }
        .pdf        { background-position: 0 -32px; }
        .html       { background-position: 0 -48px; }
        .image      { background-position: 0 -64px; }

        .box-col { min-width: 300px;}

        /* fix for style regression, available in internal builds */
        .k-treeview .k-checkbox { opacity: 1; width: auto; }
    </style>
</div>

<center><button onclick="fetchIDs()">Generate Form</button></center><br><br>

<!--<div id = "final_form"></div>-->

<script type="text/javascript">
    

    var input_array = [];
    var div_id = 0;
    var add_id = 0;
    var remove_id = 0;
    var input_id = 0;
    var add_id_copies = 0;
    var remove_id_copies = 0;
    var input_id_copies = 0;



    function fetchIDs(){


    var getArray = document.getElementById('result');
    rawArray = getArray.innerHTML;
    console.log(rawArray);
    preArray = rawArray.split(',');
    var IDarray = preArray;
    IDarray[0] = preArray[0].split(':')[1].split(' ')[1];
    
    //console.log(preArray[0].split(':')[1]);
    console.log(IDarray);
    console.log(data);
    console.log(data.length);

    var result = []; 
    var i;
    var j;
   // console.log(data.id);
   /*for (j = 0 ; j < IDarray.length; j++)
   {
        console.log("inside outer loop\n");
        for(i = 0 ; i < data.length; i++)
        {
            console.log("inside inner loop\n");

            if (IDarray[j] == data[i].id){
                console.log("found for " + IDarray[i]+ " hurrah\n");
                break;
            }

        }   
}*/

    for(i = 0 ; i < data.length; i++ )
    {
        console.log(data[i].id);
    }


//    console.log(getObject(data, IDarray));
/*for (i = 0; i < IDarray.length; i++)
{
    var elementPos = data.map(function(x) {return x.id; }).indexOf(IDarray[i]);
}

console.log(elementPos);

var objectFound = data[elementPos];

console.log(objectFound);*/
if(data[9].items)
console.log(data[9].items[0]);

fetchIDs2(data, IDarray);
console.log("the fetched ones : " + input_array);

    var cover_box = document.createElement('div');
    cover_box.id = div_id++;
    cover_box.setAttribute("style","margin-left:350px;background-color:rgb(100,172,152);width:670px;border:solid;padding-top:12px;border-radius:20px;border-width:5px");

    for (var index = 0; index < input_array.length; index++)
    {
        var label = document.createElement('label');
        label.setAttribute("style","font-size:16px;");
        // this is to remove the former "has" substring from the label
        //===================================================================================
        if(input_array[index].indexOf("has") == 0)
        {
            new_label = input_array[index];
            new_label = new_label.replace("has",'');
            label.innerHTML = new_label + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        else
        {
            label.innerHTML = input_array[index] + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        //===================================================================================
        //cover_box.innerHTML += input_array[index] + '&nbsp;';
        cover_box.appendChild(label);
        var field = document.createElement('input');
        field.setAttribute("style","border-radius:5px;");
        var set_input_id = input_array[index]+ '_' + input_id++;
        field.setAttribute("id",set_input_id);
        cover_box.appendChild(field);
        cover_box.innerHTML += "&nbsp;&nbsp"

        var add_btn = document.createElement('button');
        add_btn.setAttribute("style","font-weight:bold;");
        var set_id_for_add_btn = "add_button_" + input_array[index] + '_' + add_id++;
        add_btn.setAttribute("id",set_id_for_add_btn);
        console.log("================================"+set_id_for_add_btn+"=====================================================");
        add_btn.innerHTML = "+";
        add_btn.setAttribute("onclick","add_field(this.id)");
        //the other function call to add a field
       // add_btn.onclick = function(){add_field(this.id,input_array[index])};
        //var rm_button = document.createElement('button');
        //rm_button.setAttribute("style","font-weight:bold;");
        //var set_id_for_remove_btn = "remove_button_" + input_array[index] + '_' + remove_id++;
        //rm_button.setAttribute("id",set_id_for_remove_btn);
        //rm_button.setAttribute("onclick","remove_field(this.id)");
        //rm_button.innerHTML = '-';
        cover_box.appendChild(add_btn);
        //cover_box.appendChild(rm_button);
        cover_box.innerHTML += '<br><br>';
    }

    document.getElementsByTagName('body')[0].appendChild(cover_box);
return;
    }



//===========================================================================
// this is remove function
function remove_field(btnID,fieldID){

    //console.log(fieldID);
    //var extracted_field_id = fieldID.split("remove_button_")[1].split();
    //document.getElementById(extracted_id).value = "i am the culprit";
    var br = document.getElementById(btnID).nextSibling;
    console.log(br);
    br.parentNode.removeChild(br);
    var tar = document.getElementById(btnID);
    tar.parentNode.removeChild(tar);
        
    //remove_id_copies--;

    tar = document.getElementById(fieldID);
    tar.parentNode.removeChild(tar);
    //input_id_copies--;
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
//============================================================================


//============================================================================
//this is add function
function add_field(fieldID){

    //console.log(field_label);
    var temp = fieldID;
    var br_tag = document.createElement('br');
    var reference = document.getElementById(fieldID);
    reference.parentNode.insertBefore(br_tag,reference.nextSibling);

    var extracted_id = temp.replace("add_button_","");
    var copy_id = extracted_id+"copy_"+input_id_copies++;
    var field_copy = document.createElement('input');
    field_copy.setAttribute("id",copy_id);
    field_copy.setAttribute("style","border-radius:5px;");
    var rm_button = document.createElement('button');
    rm_button.setAttribute("style","font-weight:bold;");
    var set_id_for_rm_btn_copy = "remove_button_" + copy_id +'_'+remove_id_copies++;
    rm_button.setAttribute("id",set_id_for_rm_btn_copy);
    //rm_button.setAttribute("onclick","remove_field(this.id,copy_id)");
    rm_button.onclick = function(){remove_field(this.id,copy_id)};
    rm_button.setAttribute("style","font-weight:bold;");
    rm_button.innerHTML = "-";
    var reference_input = document.getElementById(fieldID);
    reference_input.parentNode.insertBefore(field_copy,br_tag.nextSibling);
    field_copy.parentNode.insertBefore(rm_button,field_copy.nextSibling);


}
//============================================================================
    var flag = 0;

function fetchIDs2(object, IDarray)
{

                    
    if (object instanceof Array)
    {
        //checking if each object's id is equal to any of the IDs in IDarray, recursively
        for(var i=0; i < object.length; i++ )  //for every element in object
        {
            //console.log(object[i]);
            //console.log(object[i].id);
            //console.log(IDarray.length);
            for(var ind = 0; ind < IDarray.length; ind++) //chek if the object's id matches with any element in IDarray
            {
                if(object[i].id == IDarray[ind])
                {

                    input_array.push(object[i].text);   //push the matched ones' text values into a global input_array.
                                                        // this will be helpful in generating forms
                    /*================================================================================
                    //console.log("I found it\n");
                    console.log(IDarray[ind]+" : "+object[i].text);
                    // var target = document.getElementById("final_form");
                    // var temp = document.createElement("input");
                          
                    //if(flag == 0)
                    //{
                        //var addbtn = document.createElement("button");
                        //addbtn.setAttribute("onclick","fetchIDs()");
                        //addbtn.value = 'Add';
                        //addbtn.setAttribute('id','addbtn');
                        //addbtn.innerHTML = 'ADD more'
                        //target.appendChild(addbtn);
                        //target.innerHTML += "<br>"
                        //  flag = 1;
                    //}
                    
                    //temp.setAttribute("style", "margin-left:120px; display: block; box-sizing:border-box;");
                    //target.innerHTML += object[i].text + "&nbsp;";
                    //document.setAttribute("type","text");
                    //cover_box.appendChild(temp);
                    //cover_box.appendChild(addbtn);
                    
                    //cover_box.innerHTML += "<br><br>";
                    ===================================================================================*/
                    break;
                }

            }
            
            if(object[i].items)
                fetchIDs2(object[i].items, IDarray);
        }
    }

}




    </script>
</body>
</html>
