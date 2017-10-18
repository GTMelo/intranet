<template>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">{{ label }}</label>
        </div>
        <div class="field-body">
            <span v-for="option in valuesList">
                <input class="is-radio" :id="option[0]" type="radio" :name="name" :value="option[0]" :checked="option[2]">
                <label :for="option[0]">{{option[1]}}</label>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["name", "values", "label"],
        computed: {
            valuesList() {
                return this.parseValues(this.values);
            },
        },
        methods: {
            parseValues(thing) {
                let result = [];
                let firstPass = thing.split(",");
                firstPass.forEach(function (entry) {
                    let parsed = entry.split("|");
                    parsed[2] = (parsed[2] === "true");
                    result.push(parsed);
                });
                console.log(result);
                return result;
            },
        }
    }
</script>