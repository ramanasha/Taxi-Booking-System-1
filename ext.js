function x()
{
var a,b,e,f,un,pw,ulen,plen,apos,dpos1,dpos2,aflag=0,uflag=0,pflag=0,cflag=0;
a=document.f.s.value;
e=document.f.p.value;
un=document.f.txtun.value;
pw=document.f.txtpw.value;
f=e.length;
ulen=un.length;
plen=pw.length;
b=a.length;
apos=a.indexOf("@");
dpos1=a.indexOf(".");
dpos2=a.lastIndexOf(".");
if(ulen<1 || plen<1 || b<1 || f<1)
{
aflag=1;
alert("Please fill all form fields");
document.f.txtun.focus();
document.f.txtun.value="";
document.f.txtpw.value="";
document.f.p.value="";
document.f.s.value="";
}

if((ulen<2 || ulen>10) && (aflag==0))
 {
uflag=1;
 alert("Enter username between 3 and 10 characters");
document.f.txtun.focus();
document.f.txtun.value="";
 }
 if((plen<2 || plen>10) && (aflag==0))
 {
pflag=1;
  alert("Enter password between 2 and 10 characters");
document.f.txtpw.focus();
document.f.txtpw.value="";
 }
if((pw!=e) && (aflag==0))
{
pflag=1;
alert("Invalid confirmation password");
document.f.p.focus();
document.f.p.value="";
}
if((apos==0 || apos==-1 || apos==b || dpos1==0|| apos-dpos1<=3||dpos2-apos<=3||dpos1==-1||dpos2==b-1) &&
(aflag==0))
{
cflag=1;
alert("Invalid email address");
document.f.s.focus();
document.f.s.value="";
}
 for(i=0; i<ulen; i++)
 {
  var ch=un.charAt(i);
  if((ch<"a" || ch>"z") && (ch<"A" || ch>"Z") && (ch<"0" || ch>"9"))
{
uflag=1;
 alert("Use of special character is prohibited");
document.f.txtun.focus();
document.f.txtun.value="";
 break;
}
}
for(i=0;i<plen;i++)
{
 var ch=pw.charAt(i);
 if(ch==" ")
{pflag=1;
 alert("Please enter a password");
document.f.txtpw.focus();
document.f.txtpw.value="";
}
 break;
}
if(uflag==0 && pflag==0 && aflag==0 && cflag==0)
{
alert("Registration Successful!");
window.open("aboutus.php");
}
}