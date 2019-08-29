<template>
	<b-media :right-align="writtenByMe" vertical-align="center">
	    <b-img :src="image" rounded="circle" slot="aside" width="45" height="45" alt="placeholder"></b-img>
	    <b-card>
	    	<slot></slot>
	    </b-card>	      
    </b-media>
    
</template>

<script>
    export default {

    	props: { // recibe datos desde afuera  
    		writtenByMe: Boolean, 
    	    image: String
            },
        
        data() {
            return {
            	
            };
        },
        mounted() {
            console.log(myImage);
           //console.log('Component mounted.');
           //console.log(this.writtenByMe)
        }
    }
</script>