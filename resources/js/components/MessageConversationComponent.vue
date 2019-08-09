<template>
	<b-media :right-align="writtenByMe" vertical-align="center">
	    <b-img rounded="circle" slot="aside"blank blank-color="#ccc" width="50" alt="placeholder"></b-img>
	    <b-card>
	    	<slot></slot>
	    </b-card>	      
    </b-media>
    
</template>

<script>
    export default {

    	props: { // recibe datos desde afuera  
    		writtenByMe: Boolean 
    	},
        data() {
            return {
            	
            };
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.writtenByMe)
        }
    }
</script>