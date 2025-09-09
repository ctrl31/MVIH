<!--Header-->
<script setup>
import Logo from '../../Assets/logoOvih.png'

</script>
<template>
   <header class=" px-4 py-4  top-0 z-50 flex justify-between items-center bg-[#6F1132] shadow-md sticky">
      <!--LOGO MVIH con redireccion-->
        <a href="/" class="flex-shrink-0">
         <img :src="Logo" alt="logo" class="h-6 md:h-12 lg:h-16 w-auto" >
        </a>
   </header>

</template>
