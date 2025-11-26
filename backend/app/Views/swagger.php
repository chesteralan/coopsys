<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>API Documentation</title>
  <link rel="stylesheet" type="text/css" href="/swagger/swagger-ui.css" />
  <style>
    body { margin: 0; background: #fafafa; }
  </style>
</head>

<body>
<div id="swagger-ui"></div>

<script src="/swagger/swagger-ui-bundle.js"></script>
<script src="/swagger/swagger-ui-standalone-preset.js"></script>

<script>
window.onload = function() {
  const ui = SwaggerUIBundle({
    url: "/docs/v1/openapi",
    dom_id: "#swagger-ui",
    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],
    layout: "BaseLayout",
  })
}
</script>
</body>
</html>