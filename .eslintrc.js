import eslintPluginReadableTailwind from "eslint-plugin-readable-tailwind";
import { plugin } from "postcss";

module.exports = {
    env: {
        node: true,
    },
    extends: [
        'eslint:recommended',
        'plugin:vue/vue3-recommended',
        "prettier",
    ],
    rules: {
        // override/add rules settings here, such as:
        // 'vue/no-unused-vars': 'error'
        "readable-tailwind/multiline": ["warn", { printWidth: 80 }],
    },
    plugins: {
        "readable-tailwind": eslintPluginReadableTailwind,
    }
}