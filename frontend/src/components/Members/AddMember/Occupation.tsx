import ComponentCard from "@/components/common/ComponentCard";
import Select from "@/components/form/Select";

const OCCUPATION = [
  "Government Employee",
  "Business Person/Entrepreneur",
  "Housewife / Househusband",
  "Private Employee",
  "Church Servants/Workers",
  "Youth / Student",
  "Self-Employed (Practicing Professional)",
  "Overseas Filipino Worker (OFW)",
  "Farmer / Fisherfolk",
  "Self-Employed (Non-Professional)",
  "Retiree / Pensioner",
  "Laborer / Factory Worker",
];

export default function Occupation() {
  const options = OCCUPATION.map((item) => ({
    value: item
      .toLowerCase()
      .replace(" / ", "/")
      .replace(/ /g, "-")
      .replace(/\//g, "-"),
    label: item,
  }));
  const handleSelectChange = (value: string) => {
    console.log("Selected value:", value);
  };
  return (
    <ComponentCard title="Occupation">
      <Select
        options={options}
        placeholder="Select Option"
        onChange={handleSelectChange}
        className="dark:bg-dark-900"
      />
    </ComponentCard>
  );
}
