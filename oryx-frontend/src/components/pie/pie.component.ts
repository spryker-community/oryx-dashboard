import { LitElement, html } from "lit";
import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";
import {state} from 'lit/decorators.js';

export class PieComponent extends LitElement {
    backEndUrl = "http://backend-api.de.spryker.local/api/rest/most-selling-products?filter={\"startDate\": \"2023-09-01\", \"endDate\": \"2023-09-14\"}";

    @state({type: Array})
    data = []
    constructor() {
        super();

        fetch(this.backEndUrl)
            .then((response) => response.json())
            .then(data => this.data = data.data);
    }

    render() {
        const pieHtml = this.pieChart();

        return html`
            <div>${pieHtml}</div>
            `;
    }

    pieChart() {
        const width = 928;
        const height = Math.min(width, 500);

        // Create the color scale.
        const color = d3.scaleOrdinal()
            .domain(this.data.map(d => d.sku))
            .range(d3.quantize(t => d3.interpolateSpectral(t * 0.8 + 0.1), this.data.length).reverse())

        // Create the pie layout and arc generator.
        const pie = d3.pie()
            .sort(null)
            .value(d => d.total);

        const arc = d3.arc()
            .innerRadius(0)
            .outerRadius(Math.min(width, height) / 2 - 1);

        const labelRadius = arc.outerRadius()() * 0.8;

        // A separate arc generator for labels.
        const arcLabel = d3.arc()
            .innerRadius(labelRadius)
            .outerRadius(labelRadius);

        const arcs = pie(this.data);

        // Create the SVG container.
        const svg = d3.create("svg")
            .attr("width", width)
            .attr("height", height)
            .attr("viewBox", [-width / 2, -height / 2, width, height])
            .attr("style", "max-width: 100%; height: auto; font: 10px sans-serif;");

        // Add a sector path for each value.
        svg.append("g")
            .attr("stroke", "white")
            .selectAll()
            .data(arcs)
            .join("path")
            .attr("fill", d => color(d.data.sku))
            .attr("d", arc)
            .append("title")
            .text(d => `${d.data.sku}: ${d.data.total.toLocaleString("en-US")}`);

        // Create a new arc generator to place a label close to the edge.
        // The label shows the value if there is enough room.
        svg.append("g")
            .attr("text-anchor", "middle")
            .selectAll()
            .data(arcs)
            .join("text")
            .attr("transform", d => `translate(${arcLabel.centroid(d)})`)
            .call(text => text.append("tspan")
                .attr("y", "-0.4em")
                .attr("font-weight", "bold")
                .text(d => d.data.sku))
            .call(text => text.filter(d => (d.endAngle - d.startAngle) > 0.25).append("tspan")
                .attr("x", 0)
                .attr("y", "0.7em")
                .attr("fill-opacity", 0.7)
                .text(d => d.data.total.toLocaleString("en-US")));

        // Append the SVG element.
        return svg.node();
    }
}
