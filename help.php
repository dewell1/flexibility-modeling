<?php
require_once 'php/controller/help-controller.php';

$pageTitle = "Help";
include $abs_path . '/php/include/head.php';
$_SESSION['currentpage'] = 'help';
?>

<!DOCTYPE html>
<html>

<body>
    <?php include 'php/include/header.php'; ?>
    <?php include 'php/include/notifications.php'; ?>

    <main>
        <article class="standard-article">

            <div class="content-box">
                <h1 id="help-tutorial" onclick="toggleCollapseTutorial()">
                    <span id="collapse-icon-tutorial">▼</span> Using the Flexibility Model Recommender: A Step-by-Step
                    Guide
                </h1>
                <div id="collapse-content-tutorial">
                    To demonstrate how to use the <b>Flexibility Model Recommender</b>, we will walk through a sample
                    scenario
                    step by step. This example illustrates the selection process and filtering workflow, making it
                    easier to understand how the tool helps identify suitable flexibility models based on specific
                    needs.
                    <br><br>

                    <h2>Example scenario</h2>
                    A <b>Virtual Power Plant (VPP)</b> aggregates multiple small-scale flexibility resources (such as
                    residential batteries and industrial demand response participants) to enhance grid stability while
                    managing uncertainties in renewable energy generation.
                    <br><br>
                    To develop a model, the first step is defining the important parameters specific to the VPP. These
                    parameters will guide your model selection or development process. Some of the key parameters would
                    be:

                    <ul>
                        <li><b>Resource Types:</b> What are the flexibility resources? (e.g., residential batteries,
                            industrial demand
                            response)</li>
                        <li>Uncertainty Handling:</b> How will the model address renewable energy variability? This
                            might involve
                            probabilistic forecasting, storage management, and demand-side adjustments.</li>
                        <li><b>Grid Stability:</b> What specific grid stability measures need to be incorporated, such
                            as frequency
                            regulation or balancing load in real-time?</li>
                        <li><b>Optimization Goals:</b> What are the optimization objectives of the VPP? (e.g.,
                            minimizing costs,
                            maximizing energy efficiency, balancing supply and demand, ensuring stability)</li>
                        <li><b>Time Horizon:</b> How quickly must decisions be made? (e.g., real-time or over a longer
                            planning
                            horizon)</li>
                        <li><b>Economic Factors:</b> Are there any constraints around cost or financial optimization, or
                            is it
                            primarily focused on stability?</li>
                    </ul>






                    <h2>Step 1: Exploring Parameter Options</h2>
                    Before selecting parameters, we familiarize ourselves with the available choices:
                    <ul>
                        <li>
                            The <a target=_blank href="help.php#help-tutorial"></a>Parameter Explanation article on the
                            Help page</a> provides an overview.

                        </li>
                        <li>
                            Alternatively, clicking the information icon <i class="bi bi-info-circle"></i> next to each
                            parameter within the Flexibility
                            Model Recommender opens a popover with a description.
                        </li>
                    </ul>

                    <img class="tutorial-image" src="images/tutorial_infoicon.png"> <br>
                    <h2>Step 2: Selecting Parameters for the Scenario</h2>
                    Next, we navigate to the <a target=_blank href="recommender.php">Flexibility Model
                        Recommender</a> and define our selection:<br><br>

                    <img class="tutorial-image" src="images/tutorial_recommender.png">
                    <hr>
                    Using the <b>three-way checkboxes</b> next to each parameter, we categorize them as mandatory,
                    desired, or
                    irrelevant for our VPP scenario.
                    <img class="tutorial-image" src="images/tutorial_checkbox.png"><br><br>


                    In the following, we derive a selection of relevant parameters from the initial set of important
                    criteria, based on the available options in the recommender. To illustrate its use, we emphasize
                    certain aspects while intentionally omitting others, without claiming that this represents the
                    optimal parameter choice for the given VPP scenario.<br><br>
                    <h3><input class="form-check-input" type="checkbox">
                        <label class="form-check-label checked">
                            Mandatory</label> Parameters (Strictly Required)
                    </h3>
                    <ol>
                        <li><b>Demand Response Programs</b> (Asset Type) → The VPP includes demand-side participants
                            that adjust consumption based on market signals.</li>
                        <li><b>Energy Storage Systems</b> (Asset Type) → Distributed batteries are used to store excess
                            energy and discharge it when needed.</li>
                        <li><b>Uncertainty</b> → The VPP must handle fluctuations in renewable generation and demand
                            variations.</li>
                        <li><b>Aggregation</b> → The model must support grouping multiple smaller flexibility resources
                            into a unified entity.</li>
                    </ol>

                    <h3><input class="form-check-input" type="checkbox">
                        <label class="form-check-label">
                            Desired</label> Parameters (Preferred but not mandatory)
                    </h3>
                    <ol start="5">
                        <li><b>Short-term Resolution</b> → The VPP operates in real-time and short time frames, so
                            models with short-term decision-making are beneficial.</li>
                        <li><b>Economic Constraints</b> → The VPP aims to optimize financial outcomes but does not make
                            it an absolute requirement.</li>
                    </ol>

                    <h3><input class="form-check-input" type="checkbox">
                        <label class="form-check-label exclamation"></label> Irrelevant Parameters (Not considered)
                    </h3>
                    <ul>
                        <li><b>Other parameters</b> are not relevant to this example.
                    </ul>
                    At this point, the parameter selection should match the intended scenario.
                    <br><br>

                    <img class="tutorial-image" src="images/tutorial_parameterchoice.png"> <br>

                    <h2>Step 3: Adjusting Match Requirements</h2>
                    We now define the <b>minimum number of desired parameters</b> a flexibility model must meet.
                    <ul>
                        <li>
                            In this example, we set the value to 1, meaning at least one of our desired parameters must
                            be present.
                        </li>
                        <li>
                            Setting this value to 2 would require both desired parameters to be included, effectively
                            making them mandatory.
                        </li>
                    </ul>
                    <img class="tutorial-image" src="images/tutorial_settings.png"> <br>
                    <br>

                    <h2>Step 4: Retrieving Matching Models</h2>
                    Finally, we click the <b>"Show Models" button</b>, and the recommender generates a list of
                    flexibility models that
                    best match our selected parameters, displaying the most relevant options first.<br><br>

                    Clicking on any model in the results expands it to reveal more details.<br><br>

                    <b>Example of a possible result:</b><br><br>
                    <img class="tutorial-image" src="images/tutorial_result.png"> <br>

                    <h2>Conclusion</h2>
                    By following this process, you can efficiently use the Flexibility Model Recommender to identify
                    models that best suit your specific needs, ensuring a streamlined selection process for various
                    flexibility scenarios.
                    <br><br>
                    For a comprehensive overview of all available models and their details, navigate to the <a
                        target_blank href="models.php">Models tab</a>.
                </div>
                <hr>
                <h1 id="help-parameters" onclick="toggleCollapseParameters()">
                    <span id="collapse-icon-parameters">▼</span> Parameter Explanation
                </h1>
                <div id="collapse-content-parameters">
                    <h2>Flexibility</h2>
                    <ul>
                        <li><strong>Flexibility Potential:</strong> Represents the capability of flexibility
                            resources
                            (like energy storage, demand response) to adjust their power output or consumption,
                            providing
                            essential services like energy supply or demand balance.</li>
                        <li><strong>Flexibility Requirement:</strong> Refers to the overall needs of the power
                            system
                            for
                            flexible resources to maintain stable operations and adapt to variability, such as that
                            from
                            renewable energy sources. This quantifies the adjustments necessary across the system to
                            ensure
                            reliability and prevent disruptions.</li>
                    </ul>
                    <h2>Asset Types</h2>
                    <ul>
                        <li><strong>Energy Storage Systems</strong>: Such as batteries, pumped hydro storage, and
                            compressed air energy storage, which can absorb excess power during low demand and
                            release
                            it
                            during peak demand.</li>
                        <li><strong>Demand Response Programs</strong>: These involve adjusting the demand side of
                            consumption, where consumers reduce or shift their electricity use in response to market
                            signals
                            or utility requests.</li>
                        <li><strong>Renewable Energy Sources</strong>: Like wind turbines and solar panels, which
                            are
                            inherently variable and require flexible solutions to integrate their output smoothly
                            into
                            the
                            grid.</li>
                        <li><strong>Distributed Generation</strong>: Including small-scale units like diesel
                            generators,
                            microturbines, and combined heat and power (CHP) systems that can be controlled to help
                            balance
                            local demand and supply.</li>
                        <li><strong>Flexible Loads</strong>: Industrial processes, heating and cooling systems, and
                            other
                            energy-intensive operations that can be adjusted in real-time to help balance the grid.
                        </li>
                        <li><strong>Grid Infrastructure</strong>: Advanced transmission technologies, including
                            smart
                            grids
                            and dynamic line rating systems, that can adapt to changing conditions and manage flows
                            more
                            effectively.</li>
                        <li><strong>Electric Vehicles (EVs)</strong>: Their charging and discharging can be managed
                            to
                            provide flexibility, particularly as the prevalence of EVs continues to increase.</li>
                        <li><strong>Interconnectors</strong>: High voltage lines connecting different regions or
                            countries,
                            allowing for the transfer of electricity across borders, which can be used to balance
                            regional
                            differences in demand and supply.</li>
                        <li><strong>Peaking Power Plants</strong>: Typically gas turbines or hydro plants that can
                            be
                            ramped up quickly to meet sudden increases in electricity demand or unexpected drops in
                            renewable generation.</li>
                    </ul>
                    <h2>Classification</h2>
                    <ul>
                        <li><strong>Metric: </strong> Uses predefined parameters to either deterministically
                            quantify
                            flexibility without considering uncertainties or Measures the likelihood of various
                            flexibility
                            scenarios using statistical methods.</li>
                        <li><strong>Machine Learning Model:</strong> Employs machine learning techniques to predict
                            and
                            optimize flexibility based on historical data.</li>
                        <li><strong>Envelope:</strong> Defines the operational boundaries or limits within which
                            flexibility
                            can
                            be effectively measured or maintained. This includes the range of acceptable inputs,
                            outputs,
                            and
                            constraints on flexibility metrics or predictions.</li>
                    </ul>
                    <h2>Classification Details</h2>
                    <ul>
                        <li><strong>Time Series - Cumulative:</strong> Analyzes flexibility over a period by
                            aggregating
                            data
                            to show cumulative potential or requirements.</li>
                        <li><strong>Time Series - Non-Cumulative:</strong> Examines flexibility potentials or
                            requirements
                            at
                            specific times without accumulating data over time.</li>
                        <li><strong>Set - Interval:</strong> Represents flexibility within set boundaries defined by
                            minimum
                            and maximum values at a specific time.</li>
                        <li><strong>Set - Polytope - Single-Time-Step:</strong> Defines flexibility as a geometric
                            shape
                            in
                            a
                            multidimensional space at a single time step, capturing constraints and capabilities.
                        </li>
                        <li><strong>Set - Polytope - Multi-Time-Step:</strong> Extends the single-time-step polytope
                            model
                            to
                            cover multiple time steps, providing a broader view of flexibility over time.</li>
                    </ul>
                    <h2>Type</h2>
                    <ul>
                        <li><strong>Deterministic</strong>: Using specific, fixed parameters and conditions to
                            calculate
                            flexibility needs and potentials. These models operate under the assumption that all
                            inputs
                            (such as demand forecasts, generation capacity, and operational constraints) are known
                            and
                            remain constant, leading to predictable and consistent outcomes.</li>
                        <li><strong>Probabilistic</strong>: Accounting for the uncertainty inherent in energy
                            systems by
                            using probability distributions and stochastic processes to determine flexibility
                            requirements
                            and resources. These models consider variations in input data like renewable energy
                            output,
                            consumer demand, and equipment failures, providing a range of possible outcomes rather
                            than
                            a
                            single deterministic result.</li>
                    </ul>
                    <h2>Time</h2>
                    <ul>
                        <li><strong>Discrete</strong>: Using specific, fixed parameters and conditions to calculate
                            flexibility needs and potentials. These models operate under the assumption that all
                            inputs
                            (such as demand forecasts, generation capacity, and operational constraints) are known
                            and
                            remain constant, leading to predictable and consistent outcomes.</li>
                        <li><strong>Continuous</strong>: Accounting for the uncertainty inherent in energy systems
                            by
                            using
                            probability distributions and stochastic processes to determine flexibility requirements
                            and
                            resources. These models consider variations in input data like renewable energy output,
                            consumer
                            demand, and equipment failures, providing a range of possible outcomes rather than a
                            single
                            deterministic result.</li>
                    </ul>
                    <h2>Metric</h2>
                    <ul>
                        <li><strong>Active power:</strong> The real component of power that performs actual work in
                            an
                            electrical system, typically measured in watts (W) or megawatts (MW).</li>
                        <li><strong>Ramp-Rate:</strong> The rate at which power output can be increased or
                            decreased,
                            usually measured in megawatts per minute (MW/min), indicating the flexibility of power
                            generation or consumption.</li>
                        <li><strong>Reactive power:</strong> The imaginary component of power that does not perform
                            work
                            but is necessary to maintain voltage levels for the stability of the power system,
                            usually
                            measured in volt-amperes reactive (VAR).</li>
                        <li><strong>Energy:</strong> The total amount of work performed or electricity consumed over
                            a
                            period, typically measured in kilowatt-hours (kWh) or megawatt-hours (MWh).</li>
                        <li><strong>Voltage:</strong> The electric potential difference between two points in a
                            circuit,
                            which drives the current through the electrical system, typically measured in volts (V).
                        </li>
                    </ul>
                    <h2>Constraints</h2>
                    <ul>
                        <li><strong>Technical:</strong> Define the physical limits of power system components, such
                            as
                            maximum
                            power output and ramp rates.</li>
                        <li><strong>Service Guarantee:</strong> Ensure that flexibility resources meet specific
                            performance
                            and
                            reliability standards, such as response times and availability.</li>
                        <li><strong>Economic:</strong> Focus on minimizing operational costs and optimizing
                            financial
                            outcomes
                            from managing flexibility resources.</li>
                    </ul>

                    <h2>Resolution</h2>
                    Refers to the time granularity considered for analyzing power system operations and
                    planning.<br>
                    <ul>
                        <li><strong>Short-term:</strong> Focuses on immediate operational decisions, covering
                            minutes to
                            a
                            day,
                            essential for dispatching resources and managing real-time fluctuations in power supply.
                        </li>
                        <li><strong>Long-term:</strong> Used for strategic planning over weeks to years, crucial for
                            infrastructure development, integration of renewables, and long-term investment
                            decisions.
                        </li>
                    </ul>

                    <h2>Sector Coupling</h2>
                    The consideration of sector coupling depends on whether the flexibility resources involve
                    multiple
                    energy
                    vectors, specifically heat and gas. Sector-coupled flexibility resources can include individual
                    units
                    such
                    as CHP (Combined Heat and Power) plants and electrolyzers, or entire systems like gas
                    networks.<br><br>

                    <h2>Multi-time-scale</h2>
                    If checked, it implies that the specific flexibility model under consideration
                    is capable of integrating and analyzing flexibility across multiple time scales (short-term,
                    medium-term,
                    long-term) simultaneously or dynamically. This means the model can handle and optimize
                    flexibility
                    requirements and resources across these different
                    scales in a cohesive manner, which is essential for
                    comprehensive energy system planning and operation.<br><br>

                    <h2>Mediator</h2>
                    Facilitates the matching of flexibility requirements with flexibility potentials within an
                    energy
                    system. It acts as an intermediary that helps integrate and optimize the use of available
                    flexibility
                    resources, ensuring that the power system can efficiently respond to fluctuations in demand and
                    supply.
                    Common examples of flexibility mediators include the power grid itself, which redistributes
                    energy,
                    and
                    market mechanisms that allow for the trading of flexibility services to balance the
                    system.<br><br>


                    <h2>Uncertainty</h2>
                    Refers to the unpredictability associated with various factors that affect the balance between
                    electricity
                    supply and demand. This includes variability in renewable energy production due to weather
                    conditions,
                    fluctuations in consumer demand, and potential equipment malfunctions or failures. Addressing
                    uncertainty in
                    flexibility models is crucial for ensuring that the power system can reliably handle unexpected
                    changes
                    and
                    maintain stability under diverse operational conditions.<br><br>

                    <h2>Aggregation</h2>
                    Refers to the model's ability to combine multiple smaller units of flexibility resources (like
                    residential
                    batteries, electric vehicles, or demand response participants) into a single, manageable entity.
                    This
                    aggregation allows for more effective coordination and utilization of distributed resources,
                    enhancing
                    their
                    overall impact on grid stability and efficiency. By treating multiple small-scale assets as a
                    unified
                    group,
                    operators can deploy flexibility more strategically, optimizing responses to grid demands and
                    reducing
                    operational complexities.
                </div>
            </div>
        </article>
    </main>
    <script src="js/script.js"></script>

</body>

<style>
    #collapse-content {
        display: block;
        /* Standardmäßig sichtbar */
        transition: all 0.3s ease-in-out;
    }

    h1 {
        cursor: pointer;
        user-select: none;
    }

    #collapse-icon {
        margin-right: 8px;
        transition: transform 0.3s ease;
    }
</style>

<script>
    function toggleCollapseParameters() {
        const content = document.getElementById("collapse-content-parameters");
        const icon = document.getElementById("collapse-icon-parameters");

        if (content.style.display === "none") {
            content.style.display = "block";
            icon.textContent = "▼"; // Zeigt nach unten
        } else {
            content.style.display = "none";
            icon.textContent = "▶"; // Zeigt nach rechts
        }
    }
    function toggleCollapseTutorial() {
        const content = document.getElementById("collapse-content-tutorial");
        const icon = document.getElementById("collapse-icon-tutorial");

        if (content.style.display === "none") {
            content.style.display = "block";
            icon.textContent = "▼"; // Zeigt nach unten
        } else {
            content.style.display = "none";
            icon.textContent = "▶"; // Zeigt nach rechts
        }
    }
</script>


<?php include $abs_path . '/php/include/footer.php'; ?>

</html>