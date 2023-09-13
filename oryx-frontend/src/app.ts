import { appBuilder } from '@spryker-oryx/application';
import { storefrontFeatures } from '@spryker-oryx/presets/storefront';
import { storefrontTheme } from '@spryker-oryx/themes';
import {provideExperienceData} from '@spryker-oryx/experience';
import {pieComponent} from "./components/pie/pie.def";
import {pie2Component} from "./components/pie2/pie2.def";
import {blankComponent} from "./components/blank/blank.def";

export const app = appBuilder()
    .withFeature(storefrontFeatures)
    .withTheme(storefrontTheme)
    .withEnvironment(import.meta.env)
    .withComponents([pieComponent])
    .withComponents([pie2Component])
    .withComponents([blankComponent])
    .withProviders([
        provideExperienceData({
            merge: {
                selector: "oryx-product-list",
                type: "replace",
            },
            type: "oryx-pie",
        }),
        provideExperienceData({
            merge: {
                selector: "oryx-pie",
                type: "after",
            },
            type: "oryx-pie2",
        }),
        provideExperienceData({
            merge: {
                selector: "oryx-composition",
                type: "replace",
            },
            type: "oryx-blank",
        })
    ])
    .create();
