const { override, useBabelRc } = require("customize-cra");
const webpack = require("webpack");

module.exports = override(
  // eslint-disable-next-line react-hooks/rules-of-hooks
  useBabelRc(),
  (config) => {
    config.resolve = config.resolve || {};

    // 🚀 Fix lỗi ESM fully specified
    config.resolve.fullySpecified = false;

    // 🧩 Polyfill cho các module Node bị thiếu
    config.resolve.fallback = {
      http: require.resolve("stream-http"),
      https: require.resolve("https-browserify"),
      os: require.resolve("os-browserify/browser"),
      url: require.resolve("url/"),
      buffer: require.resolve("buffer/"),
      process: require.resolve("process/browser.js"), // chú ý thêm .js
    };

    // 🪄 Inject process & Buffer globals
    config.plugins = config.plugins || [];
    config.plugins.push(
      new webpack.ProvidePlugin({
        process: "process/browser.js",
        Buffer: ["buffer", "Buffer"],
      })
    );

    return config;
  }
);
