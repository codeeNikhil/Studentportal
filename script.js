edit=document.getElementsByClassName("editing")
delet=document.getElementsByClassName("deleting")
delall=document.getElementById("delete-all");

Array.from(edit).forEach((element)=>{

    element.addEventListener("click",(e)=>{
        console.log();
        tr=e.target.parentNode.parentNode;
        namea=tr.getElementsByTagName("td")[2].innerText;
        classs=tr.getElementsByTagName("td")[3].innerText;
        regno=tr.getElementsByTagName("td")[1].innerText;
        maths=tr.getElementsByTagName("td")[4].innerText;
        physics=tr.getElementsByTagName("td")[5].innerText;
        chemistry1=tr.getElementsByTagName("td")[6].innerText;
        
        editregno.value=regno;   
        editname.value=namea;
        editclass.value=classs;
        editmaths.value=maths;
        editphysics.value=physics;
        editchem.value=chemistry1;
        sno.value=e.target.id;
        sno2.value=regno;
     
        

        
        
    })
})

Array.from(delet).forEach((element)=>{

    element.addEventListener("click",(e)=>{
        console.log();
        tr=e.target.parentNode.parentNode;
        namea=tr.getElementsByTagName("td")[1].innerText;
               
        if(confirm("Do you want to delete")){
            window.location=`/final/operations.php?deleteone=${namea}`; // new location 
        }

        
    })
})
console.log(editchem.value);




delall.addEventListener("click",(e)=>{
 
    
    if(confirm("Do you want to delete All")){
        window.location=`/final/operations.php?deleteall=${100}`; // new location 
    }

    
})