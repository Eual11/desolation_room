var current_tab = 0;
var tabs = document.getElementsByClassName("tab");
ShowTab(current_tab);

function ShowTab(n)
{
    current_tab = n;
    fixstep(n);
    for (i =0; i < tabs.length; ++i)
    {
        tabs[i].style.display = "none";
        if (i ==current_tab)
        {
            tabs[i].style.display = "block";
        }
    }

    if (current_tab ==0)
    {
        let prev = document.getElementById("prevBtn")
        {
            prev.style.display = "none";
        }
    }
    else 
    {
        document.getElementById("prevBtn").style.display = "inline-block"
    }
    
    if(current_tab == tabs.length-1)
    {
        document.getElementById("nextBtn").innerHTML = "Submit";
        
    }
    else 
    {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
}

function nextPrev(n)
{
    if(current_tab+n >= tabs.length && n >0 )
    {
        if(ValidateForm(current_tab))
            document.getElementById("regForm").submit();
    }
    if(n<0) ShowTab(current_tab +n);
    else if (ValidateForm(current_tab) && n >0)
        ShowTab(current_tab+n);
}

function ValidateForm(n)
{
    let flag = 0;
    let tab = tabs[n];
    let inputs = tab.getElementsByTagName("input");
    for (i = 0; i < inputs.length; ++i)
    {
        if (inputs[i].value =="")
        {
            invalid(i);
            flag++
        }
    }
    if (!flag)
    {
        return true
    }
    return 0;
}

function invalid(n)
{
    let tab = tabs[current_tab];
    let inputs = tab.getElementsByTagName("input");
    inputs[n].className = "invalid";
    
}
function fixstep(n)
{   
    document.getElementsByClassName("step")[n].className="step active";
    for (i =0; i <n; ++i)
    {
        document.getElementsByClassName("step")[i].className="step finish";
    }
}