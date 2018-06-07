<!DOCTYPE html>
<?php
include './Webservices/dbconn.php';
$email = $_POST["email"];
$username = $_POST["username"];
$query = "select * from `user` where `email` = '$email' and `username` = '$username'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}|:<>?-=[]\;';
    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 20; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    $query2 = "UPDATE `user` SET `password` = sha1('$string') WHERE `username` = '$username' AND `email` = '$email'";
    $result = mysqli_query($link, $query2) or die(mysqli_error($link));
//    Email init
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Your name <lucxury@lucxury.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $subject = "Lucxury - Password reset";
    $msgForWebsite = "Password has been reset. Please check your email and spam/junk folder.";
    $msgForWebsite = "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABEVBMVEX////83jcDBAUAAAD/4jjg4ODj4+P7+/ve3t7n5+f/4jf19fXx8fHb29v4+Pjt7e3W1tb/4SzAwMD/5DLS0tL/5TmRkZGxsbGumif19vyrq6vMzMyDg4NGRkbV19/GrADo6vHe4OfozTOcnJy7u7tVVVW1oCiBgYEXGBhiYmJsbGybiSP62yU0NDXExs8jIyR0dHXavgyzmwDszhrLsACvpXg/P0APEBCzsKLJsSyaiTCXl5emo5mtoGWOg1Gnl0WvqIiVjnCtmBesm0CelWudj0vRuC4rLCykoIutn1rqzjOhm36Sjnqvo2ysp5KbmIuUh0WOhV+tpX+jmnKxoEieklygkUePfyC6rG67vceVm7FoM2OtAAAVDklEQVR4nO1daVvbyLK2kWRJXjF28MJiMzgQiCGYLXtCyJwskyGZyZzkXu7//yHXUm/V3dUtyRgT5tH7IU8sC7tfVXVVdVV1u1DIkSNHjhw5cuTIkSNHjhw5cuTIkSNHjhw5bgt+4JWmCBp3PZDbwnKJ/qdS+1dybCzDF7U7G8etIQyll5V/HcVQ1ctqCb3v3qLiaZdKlTsYx+2BzUHv6ONGX7n2r0BI5bXqRNggLyr/JoNKzcqusxTBeShdvT/w68Z3iFVZIQSnFDvx68a9momB54WN0PNQC0nNzBPO8Kl0/T4g4Arn10L9bcJkmRGcUlwB1+8D2j54UWlr7xPBvgQMj8D1ewCVkkaRyGoPMHTiKw3jzP21oMtMNZJEVhuC4ZITG5l74i9KuiAaysgRhiXwxq8OKrDq+hPn4KUvXWNAGC6DN1LCD0vR8tIrVW824KwoEVLLcbTiLBHpKZ4OYZjVmFZqXsjsWTUIbjjoTCCDrDg0XPkIr8r37EOGxOenlWGoLpmXFziDyePknoAKRx46ebUKGfaR20xo1JCpvrApTM3hOWe4G7/GZNiBDF/Gl9IMs76MzruFrS/J4Ot88M4+uMxABtOGDNeR21CUTHNuUetLMsYVxyocNlcBw13kNgzLZh4LWl+Swe8Khm1wmcEnseqjzGGbr0cTAouJF6hb4GOn4Zg6dM2YOnvYbSoqipiGh51+Z4u/nLfPKHmxvw2keU++JHSUkYe+/LeE4TZguAGum1CVKAxfvR2cNJvNyTv5U+cFr8YG3YBTg4xBWEnqBdSnS16vAYbnyWOswsho+GXQLLvFKdzxKzaSOQbuvrQ+CsXAiJoJ9aPxpjpychWYGhoZ2LRUSs+9GrRiehHKXXbH/Cair8wHns6l2ugo07CuroLpWISpcZ7EFywMfSDB4V/jcpHDHfTo9fm5RM2iVSkF8phrYuBH4DKEamqcR0lDBN95eNwqArinQ/rG3BgiObGACI/ML2FBnFF8wcSwL25cShgiINg5fVCUGDIZ+kjCZCb4dMCV1Y0neyv0YsyaaqNYNDhVwAeCXPHEjU78iFSby1ETb/QnZYmgmIdzy9VRw9gm6yOa64xzvJSJmIYH8euqHkjqEza+UDWMEVQ5+ieuTLDYes3umpctJTwabH1EplocM5F3hBOg0Sbmick1MBFjbnXcGvriEzoTlWCxybzF3PwhmSxH/PGTaVltsGGLVZGzZvxmcm2kMCzgM0lMwsNTjWDx5FD6zJvDJ89ZKBgtOywzbTxQVM8iQz8Vw4BPwq3jBxpB95g5i9tiyBa5der4q+INwh01H9Qj8owitUkYwwq/2HvR0giKachNab0Rlko3CHC0hQH11oWapnnb8QU8IA7km2nwgzEU4cW7pk6w2GTVOfL1YeDFVq/SCJBUQDqQTwI5CBp8qhOUzVAbQ64KTmBiKHS0f4IQdE/Z4iIal8yqNOOSkYy7DtTUgW+rIZvBD1M1ZQ/KmE6s89m1NSgjDMtv2ftBIdBmomXBbAHNF/aBEFfBu2oCo8RkUK+WYoSV+Ir8oOhKWWcoxPAXMgmBr2igEqulp1gNp9M3jJ0qjdrATHTE54BIjGQIo+caetPFZIM6fj+qugVVaoBYlXQNZ9jg0cKrMUawOGFKaug7smUFwNcEnleNBuT7oRd4baLrIyDEI36vqLc4RD3XvKCEWNNKQG2LnSGXC66jQElNSK4s12uBImlWhjgHFPkMENOQmtgkNSGWycDQ48/mB6qjQkmNSPKS/rIl3gcMaXgKyp40fZaIeCY6DtELVae4AEaYHZ1a0skm9pm9raFgYF9x1KxLLlgBJDIAZU9nxfanACtRAE9vVnJNnGCvi+ooqqSbX98PJoP3I/balqBSc1sqQsCQLCPgyknzt9NJ3G63S5pFCFZXxYOEUvS5hn3DfD2qpJs/Js2y67qtSYpwtSQJsBK0254y6l1AMbacINl9Dm/0OrsbDsfHo46xIgbWEUKEWwM94I5xuiX/de/dhCVwWheMhpFgTYyi2t9bIoN7tN8BLCuq2wfJbu4jq509WmoT9zrORsf0tQjZd7iZ0ZT0utvkj6J5lsRQxD+1PTG+6H/7YhAw5RlFoetqsrvSP5fIQZYsoCw0jiLK2/QLuVbxObKpLwpRJf0Gl//NiwSGnGB1TxngdDR73D5BIdZhi0ws0rU9lB27hXrRNtNeOefh86G9MYjQnUAlHb4ZwwfRZEpimIe8dNzBBfCSvy0u7srJbr//yMIvvim2oFzVlfIM15RDkwglJd18LD+HCYzIdbD0YGEfH6PjnNNHcAAoNkCy++V2Ar0ltoDkqxTqVNmI+MgMzl5WUiXFWCy/L6ifI4FNgQ2LjpFnDFPz+7uSNUngF90UfcJTpZpaUgZmnIXQ3V8rKUYQkaNBFVOQc8soHerkH0JWyaQ0hiAnIEJ1MAazCMuP+YC1FKNYNqIOn+UN9u2ziEwjLyst8AmRz/SFma4AhjxaN4qw2PwkCGopxh/sPZQh1dE+HLuj+LT4UuwRjtJRdADYpTiy2mVLRKKkNJ/FRfi7SYQiyaYTLJ5c0/caWGxBzUxD9tF7/ZWVbdn6O/ECqZqsnBGrg6PtlbYXLq/1j8iHOLS4WOgvwdyySE7G2ELyh1RJL3tGguUXjAy6eKIXpQnGupvq2xLFuKCyamcYRULra9IScS0O4V7y1/XKSodZljCOpfjAPhkiUhG0jNQ5OMWYR0yYJaWeFhrJjyBaru9BinGmwibEKZN15Dk22uaVaaMW8oH1jvFFRZG79MNT/Y5yl+VQ0VlIPxysEjbkG/pQfUcFZcIq/DbSLqIgRE9qH89dFLm13MTW/jzDiCupVhd6ot6xBmO1yAA+wSlOQ9ibdg+8N4qQlJy2LvUsuJihhmINYchjaMfRQ1fJzRfgkkLid3TjsvMhvrSP5fR9+n7vMWZpeWXfJsLCEmfIlkG1ksfDcRiORhqlxz4wPDegt7ny7OvZ1eurs4tnK5s97BajtyfGxEczjGVeyUBdhVqpZuneeuwk+aIYLJPO4e38rw7s+YHe9de3x5Nxc4pW9M94svO6P1TvGppWvkUSWf+NGtqmXYRqrwutAbIogCc2RMQdhzb7SixgWt8SeqPfj8dRrgEMyy23moMfIznv+MroKorlnel6EDVDSSJU28xpgM0lwvowSnKltyHFP/u2msjWp8txC5WN2xp3Xw3BrYb8U4TW60JHKwcrIsTVSGkEoU0SwHHWqXlUCqHrYGauW/ht/n7aMo+7WG4OPnGOFjtTbD7bRByhJMIqbujIYoOXLpF+EVZUF0J8WAABtFqpkTAUmSIT3ObgGx3jP2YlLY7/bwfxE8XkWUhXZ9wb0mSKFPtQ4YPlbmQ1YcpmtYCjP0jiRzhext/aO7bc/OE5TjBRhAUlZENL8ZTiI9mhPAVCRKe43MpkQ3n819RSjozxzPQpdA1vJIpQbSGg5RXZ6dPtg33Zo+CVGoHDS7Nz09Aa9Av/a1FSt4vLN1mEarcSlYYS1tDHI2ZiHHyilRoOtZUpAeWTN0WLkpoYJouQcmEM6bpb7fmhQhSRXbzEwCo1giCyxrGj9fg3C0WcYQoR4gwr6rwiD6gk1DT21EilhuHamIsw40H3g+mpuL99SPCF5sUZzlB9IFQJD2Q1RSo1FFvmZZ6N4s5zw5+5O39gl9OIUN0L4TQAb+22vuI2YTZxBG+3RNB2irioTKa0+S1ZhAV1i65hUxnNpog8Wfxaq9RQXFuCEzvFLj4XcUPjHg/pF1pESLksW/1hgS8t+arJUVtLl2i/UIyfs4kwovgYvYwzTCVC2rMjYhopSwtQkxmxQpJSqSHYmsHMcC7/gzqZHeQT3cGQfmHVtjStKnHpqoEhkVlN9hdqpYaiYwlOEhn+gS0wfnuOMGx9kR+/AdRssiW+Ui0RUHpgeTIHVmrYk/xqCU4SUd7Rp6L7/DfkWfBEvm0WFthEfKiYEO1vfPU+qpMwhbM3D4bTqajpKWpKW/+wsSW00KiJKCIIPWdG7nupmBo5kUyTgp0bMZwuI1QhYoZGVKK0zQ/oyIVDHFkZjmSfX5AqNaxbAS2uuOVynKUpJ1qhB4/VmYgxFLWYpC4oJV1q3FWmuhWehAWVGkZb8RZRTubkdOf91dn3s8/dwUnTHvC4ml1BGLq8TuNbe4AKugnBd5+x+3j1T1QhoNunMxHWqd1Wc3J59exwyO7vHX7tnlgdpi5EnWHrJ/u85CQ0ESKfTrTzU/u7RsxQdSsRQAaHZnkKryYtd4pIdsefX+mdWtf/ObHIUTOdiLM44VFicru3GnKSoWv5ccbQ0RhqGy6mWPk5mEwGO5+fHaKZ37gVxiJFRWYfNAfCt5Wk2YWoTkTWxm1gqMsQPB2Qdettbg5NW2Li9//Gk4Nk/JLDcHe0O9IsmziotEQDAbH5oboKjodb0edhgVdqHCdT4WLbGNwpaqobGrElAetl1UCMivCIdL2udEYqh8zAQHu6UCTIWFlDirkMUhyqM0wZsDEE8ti5M28jd+n+MEZ9/WmK0oyGbZOiypw0hsLbGxL5CrRDjmiFVNpJTT9K3RwkkKwtYdzYLt33pyFGT2DY+g/7gJSnaWm7A1mdBRw/oaTb2A4gBNiXVjx+hFQI9xD42K6YomZbVIZj1nmRFLAZRk97LiI0auSZs85/kQs4Rz4nxnK9JnuoeslT+urBgzP1sMn+QVkdli+VkSeCJguh5xbeMPRK4gSvA8xZSGhH87UWeHWftPqr7GI0hBMztM/8AX38H4rDF64idVGdPApYbHmC1svAfljj0/NL8VErjTCCSZUrfGimFiggNveDnJ8SC8P0G4GpWsFtMY8QDV/Wth4Yxo8fRwIh8g5v0fANGhf3uZxKTL+qAKC3wjy9WDzoBJf0N2WEierDB9dHozcbQ25nkO24RlAbHkqNXx9lB76dqmJIUU/cRsZuwNVUYigbVmFnMrW20O8D9aS4vWmVHaYQvJRa061le5mBCXx4l5iaSgxlZyFaFDNtImU7f9YhxbjD7uPGw4cHcpsib5pqrBk/EDuUVX6f2djPmDU1MxTxTMYDB9gjV3tM0S5Mpv/W2Rgm7IBiAzzDJqKZIdyAOB+KGhxeZ4IEe6OvZ1dnX697+icawGSMZubMDHkPW+aDP7hWrSc03PNJ2BZCGn45jruBmuPjb5xj3a5G7N1niQxhSCNOxcjeQscPMhjZuysZQRCcdY753pVy8wUbQoK7sjP8YJBhmQfdMzQJ8j0XjQ0jR6GiDVFOeyUlXVqPmRQr1rjYylCqeMPlMO+VnelUDLHzafQI5eg4D9ktoYhb1KMrmvycI6sQmQpcZMkfi2rMbH2eYCdd56O6g2L6+px7h1AEz9ryQNhzq8NgMrzKwpCfNzDriQrggKRCbf0J7Ld3nu4K4+g1+FZNZInX+p3dZ3nQ3BSam2YRcCWd+WAT+YzcxsrL/YcHBwcbe6sd+MyWK2LsSN+yUCXLg+YburKU/G+qpGT0ycvmKJRjU8zHgq5xwj4y+JZ5BwmC8mf25zdpt64mHExQisjxsB5tPW9d0XctXpkNMVOhirt748ozHULLyQThcjwBuHB+okc7XLIBGIXIM1JXWWr+E+vupixoGDZ1l5hDYd+Ab3FJYU2ZllsbErUnl7AFLxN8L1BOHvCDQBwIwL7BULLnmRRT4MaDAVvXrP6xbOE0r0OwGp4XH04cwfOgBeLT0KBj3G2ZJiKPBf7JoqS8Znj7Bwlz0aDL16gdi0kbHwsPyjMpqahW3D5DpqRbk6SnjQduPHbAszQG6Aco3R6YCK5NnTN8IqJZaVFtsHTnIx/KfMUCTrtmMjRukBBWDxMiv5aptyhlvDsfMBka1wVgV7J+Jo64ohXsbZgxyTYbktcFLZ4R044XF6c3mPfiYeDnQmTJk84KNrk+G2UgOiPJFkoBsbAcZuuzTRPtzg1sxJaVj2iNLER1Co8OywPHWpoO+DA8s4RTExbO0OUHxrC/iQ/+AhdG5lYFDHMN2RKRgmHxQXdo/YysveBzD9msSMOw2BJZNwTooYg2LDBkKwiG/7WKodU9NH/Em4wNjJl6hG4O5i3QmoPAg8mfhpaoXlaCQkkXc9q8teYAEG1Lwziqh8skY6EBDWCY3A1cHh9/Ujv3hn+eZm7mn70gMxv4AjiFrpWbk/dfRfPl8PqfQTOTm4gxnrkgczOG6RJlbrl5Muh+Pru4+H71fjCegd9Cl4YSw0Jqnxb1mkZIboJGIcLcBf2mIHe6r2feHZMJosFkbod4J4GZmptsHskAUSdY2M9CstlgOwVhfnBPmTm2F+xug6Hl0KM5opWuXjdXcJt9mG2BMBPcAZuFiTsP5gguxBk3U2ZBul1480byAXJzgzhgZ5EiBBSzrdRnwAnvwFrs7+uKE3Gxg43miNYb9k1pO4LnBKExxrMq54KySGkt+neuhcrgJ+PMBy4/TS9lX/7tUER/xGA+aP7Jv2XxP1UOWvMyr9jTovUX/467+BlvkZ33b4liS+TrEjb73hLAOc5/j2/B3Dw4FumBxetoBLgP/pttR+FsKJ+KXN3dEATNflN0BnN2/eVTbka1nXSLA/wVlM0Xc9XUBwNBsHKHv/7cBhT9b9lzaEa0jkE6+a50NAakWNi07u/NRPAFOJ083Q+P3Bpq0hTpdNMe8GWDO/4bJJLvmGDUiglf+duXN+bYOoU7VO+coLQVLUKv3zUclJgO5fELmCWv3axJbz5Qf7fX7/yczJL3jeC2BtIvILR/BYJT1NSl2+GX41kE6bYm74bwc34VglFXqnql1/kxyEhyyu+HXMb5BeagQE0vew07rwfjtIl8tzwefJH5Ve9iPWGBrzbOROiNvncnyeUKt9ycvFCP3fUWm7VIgyq+eXSzf7UzmcoSdyLulN349K1+Pkh7USWKTKjWDD8tutm5oEcll8vRrxdFJ5/EZ/KMJ8dvL0ZD7S/CX0xDBaqWX8Xauu5fnH1+3915PhgMnu9037/+/uwaPfe6Ptvv/C0IfuKvSfZiWPyA/bfDfgWEwU2GWFtQnfdm8L1gNkvoB/eCX4x64GWWpGkbxK8Lz/PS5x8qQXBnyYqboDplmSITGAaG3928H4hYlqrGUzJKnhf8MhH2DVCNj0nxwjCMD9ysxD/mGl26z7IzoNoolUqmn47PkSNHjhw5cuTIkSNHjhw5cuTIkSNHjhzzxf8DKEx76XzEOusAAAAASUVORK5CYII='>";

    $msgForEmail = "<div>Hi $username,</div><br/><div>Your password is: $string</div><br/><a href='https://www.lucxury.com/login_page.php'>Login to Lucxury</a>";

    mail("$email", "Subject 1", $msgForEmail, $headers);
} else {
    $msgForWebsite = "sorry, invalid credentials";
    $msgForWebsite = "<img src='https://cdn-images-1.medium.com/max/1600/1*CRjVBCcjUf2ZHhix9tWEIA.jpeg'>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2;url=http://www.lucxury.com/login_page.php" />
        <title></title>
    </head>
    <body>
        <?php
        echo $msgForWebsite;
        ?>

    </body>
</html>
