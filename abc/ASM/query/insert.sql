use asm2;

insert into userlogin
values
("admin","admin","2312312331","anhnqgch18888@fpt.edu.vn",1);



insert into supplier
values 
(1,"Kadokawa","Tokyo","Japan","1123456789"),
(2,"OVERLAP","Tokyo","Japan","1123456789"),
(3,"Kim Đồng WingsBook","Hà Nội","Việt Nam","1412826789"),
(4,"AMAK","Hồ Chí Minh","Việt Nam","1344567999");




insert into category (categoryname,description)
values
("Light Novel","Japanese Novel - it has some illustrations"),
("Manga","Japanese comic"),
("Figure","Figure about manga/anime/lightnovel characters");

insert into roles
values (1,"admin");



insert into product (productname,productimage,supplierid,categoryid,price)
values
("Date A Live 1","https://salt.tikicdn.com/cache/w1200/ts/product/f4/04/70/400bc1b6b7e28c3767a3577f0be0a09a.jpg",1,1,92000),
("Date A Live 2","https://salt.tikicdn.com/cache/w1200/ts/product/fd/ad/27/d49e266431df7c143b7fa5e3d1e8df3f.jpg",1,1,92000),
("Date A Live 3","https://salt.tikicdn.com/cache/w1200/ts/product/b1/7e/68/85e7380a63c1780357882e217f6a3178.jpg",1,1,92000),
("Date A Live 4","https://salt.tikicdn.com/cache/w1200/ts/product/da/6a/0b/944dde951e19be64fa53c1675b49077e.jpg",1,1,92000),
("Date A Live 5","https://salt.tikicdn.com/cache/w1200/ts/product/36/eb/55/1f48b8d4385f350b82d26baf6d418695.jpg",1,1,92000),
("Date A Live 6","https://salt.tikicdn.com/cache/w1200/ts/product/11/d3/0b/88ac9674253aed5b9677f1f18d26eb0f.jpg",1,1,92000),
("Date A Live 7","https://salt.tikicdn.com/cache/w1200/ts/product/9a/eb/f8/8b421d5e163e163f0521a5a86a628573.jpg",1,1,92000),
("Date A Live 8","https://salt.tikicdn.com/cache/w1200/ts/product/11/56/e8/5b3753d89e064a8900b9de3a9c52720e.jpg",1,1,92000),
("Date A Live 9","https://vignette.wikia.nocookie.net/date-a-live/images/3/3c/DAL_v9_Cover.jpg/revision/latest/scale-to-width-down/340?cb=20141019103110",1,1,92000),
("Date A Live 10","https://vignette.wikia.nocookie.net/date-a-live/images/f/f0/DAL_v10_Cover.jpg/revision/latest/scale-to-width-down/340?cb=20140427152322",1,1,92000);

-- Manga
insert into product (productname,productimage,supplierid,categoryid,price)
values
("One-punch Man 1","https://salt.tikicdn.com/ts/bookpreview/11/02/575916/files/OEBPS/Images/IMG_20170928_0183.gif",3,2,22000),
("One-punch Man 2","https://salt.tikicdn.com/ts/bookpreview/af/a5/603549/files/OEBPS/Images/IMG_20171209_0322.gif",3,2,22000),
("One-punch Man 3","https://salt.tikicdn.com/ts/bookpreview/51/1c/617391/files/OEBPS/Images/img353.gif",3,2,22000),
("One-punch Man 4","https://salt.tikicdn.com/ts/bookpreview/36/fa/633324/files/OEBPS/Images/img582.gif",3,2,22000),
("One-punch Man 5","https://salt.tikicdn.com/ts/bookpreview/5d/d4/648662/files/OEBPS/Images/img618.gif",3,2,22000),
("One-punch Man 6","https://salt.tikicdn.com/ts/bookpreview/4c/a0/655743/files/OEBPS/Images/img443.gif",3,2,22000),
("One-punch Man 7","https://salt.tikicdn.com/ts/bookpreview/3f/34/689034/files/OEBPS/Images/img606.gif",3,2,22000),
("One-punch Man 8","https://salt.tikicdn.com/ts/bookpreview/c6/b7/704410/files/OEBPS/Images/img335.gif",3,2,22000),
("One-punch Man 9","https://salt.tikicdn.com/ts/bookpreview/15/9b/718363/files/OEBPS/Images/img275.gif",3,2,22000),
("One-punch Man 10","https://salt.tikicdn.com/ts/bookpreview/f9/fe/752050/files/OEBPS/Images/img221.gif",3,2,22000);


insert into product (productname,productimage,supplierid,categoryid,price)
values 
 ("Date A Live 12","DAL_v12_Cover.jpg",1,1,92000),
    ("Date A Live 13","DAL_v13_Cover.jpg",1,1,92000),
    ("Date A Live 14","DAL_v14_Cover.jpg",1,1,92000),
    ("Date A Live 15","DAL_v15_Cover.jpg",1,1,92000),
    ("Date A Live 16","DAL_v16_Cover.jpg",1,1,92000),
    ("Date A Live 17","DAL_v17_Cover.jpg",1,1,92000),
    ("Date A Live 18","DAL_v18_Cover.jpg",1,1,92000),
    ("Date A Live 19","DAL_v19_Cover.jpg",1,1,92000),
    ("Date A Live 20","DAL_v2_Cover.jpg",1,1,92000),
    ("Date A Live 21","DAL_v21_Cover.jpg",1,1,92000),
    ("Date A Live 22","DAL_v22_Cover.jpg",1,1,92000);


insert into product (productname,productimage,supplierid,categoryid,price)
values 
("Emilia Figure 1","figure1.jpg",1,3,252000),
("Rem Figure 1","figure2.jpg",1,3,892000),
("Kurumi Figure 1","figure3.jpg",1,3,692000),
("Kurumi Figure 2","figure4.jpg",1,3,1090000),
("Kurumi Figure 3","figure5.jpg",2,3,2720000),
("Kurumi Figure 4","figure6.jpg",4,3,1610000),
("Tohka Figure 1","figure7.jpg",5,3,2950000),
("Tohka Figure 2","figure8.jpg",3,3,3940000),
("Tohka Figure 3","figure9.jpg",2,3,7930000),
("Mamako Figure 1","figure10.jpg",1,3,1920000),
("Yoshino Figure 1","figure11.jpg",4,3,2920000),
("Rahptalia Figure 1","figure12.jpg",5,3,5920000),
("Onee 1","figure13.jpg",2,3,7920000),
("Choco Figure 1","figure14.jpg",6,3,3920000),
("Mamako Figure 1","figure15.jpg",1,3,2920000),
("Origami Figure 1","figure16.jpg",1,3,3920000);

