const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: './index.js',
    output: {
        filename: 'public/bundle.js'
    },
    module: {
      rules: [
        {
          test: /baguetteBox\.min\.css$/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",
            use: "css-loader"
          })
        },
        {
          test: /\.css$/,
          exclude: /(baguetteBox\.min\.css|global\.css)/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",
            use: "postcss-loader"
          })
        }
      ]
    },
    plugins: [
      new ExtractTextPlugin("public/css/styles.css"),
    ]
  }